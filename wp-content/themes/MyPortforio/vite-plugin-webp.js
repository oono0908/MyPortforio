import { readFileSync, readdirSync, statSync, mkdirSync, existsSync } from 'fs';
import { join, parse, relative } from 'path';
import sharp from 'sharp';

/**
 * src/images配下の画像を自動的にWebP形式に変換してassets/imagesに出力するViteプラグイン
 * @param {Object} options - プラグインオプション
 * @param {number} options.quality - WebP品質 (0-100, デフォルト: 80)
 * @param {string} options.srcDir - ソース画像ディレクトリ (デフォルト: 'src/images')
 * @param {string} options.destDir - 出力ディレクトリ (デフォルト: 'images')
 */
export default function vitePluginWebp(options = {}) {
  const { quality = 80, srcDir = 'src/images', destDir = 'images' } = options;

  return {
    name: 'vite-plugin-webp',
    enforce: 'post',

    async closeBundle() {
      console.log('\n🖼️  [vite-plugin-webp] Converting images to WebP...');

      try {
        // src/images ディレクトリ内の全画像ファイルを取得
        const imageFiles = getAllImageFiles(srcDir);

        if (imageFiles.length === 0) {
          console.log('⚠️  [vite-plugin-webp] No images found in', srcDir);
          return;
        }

        // 出力ディレクトリを作成
        const outputDir = join('assets', destDir);
        if (!existsSync(outputDir)) {
          mkdirSync(outputDir, { recursive: true });
        }

        // 各画像をWebPに変換
        let convertedCount = 0;
        for (const filePath of imageFiles) {
          const { name, dir } = parse(filePath);
          const relativePath = relative(srcDir, dir);

          // 出力先のディレクトリ構造を維持
          const outputSubDir = join(outputDir, relativePath);
          if (!existsSync(outputSubDir)) {
            mkdirSync(outputSubDir, { recursive: true });
          }

          const outputPath = join(outputSubDir, `${name}.webp`);

          try {
            await sharp(filePath)
              .webp({ quality })
              .toFile(outputPath);

            convertedCount++;
            console.log(`  ✓ ${relative(process.cwd(), filePath)} → ${relative(process.cwd(), outputPath)}`);
          } catch (error) {
            console.error(`  ✗ Failed to convert ${filePath}:`, error.message);
          }
        }

        console.log(`\n✨ [vite-plugin-webp] Successfully converted ${convertedCount} image(s) to WebP (quality: ${quality})\n`);
      } catch (error) {
        console.error('❌ [vite-plugin-webp] Error:', error);
      }
    }
  };
}

/**
 * ディレクトリ内の全画像ファイルを再帰的に取得
 * @param {string} dir - 検索ディレクトリ
 * @returns {string[]} 画像ファイルパスの配列
 */
function getAllImageFiles(dir) {
  const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.tiff'];
  const files = [];

  if (!existsSync(dir)) {
    return files;
  }

  function scanDir(currentDir) {
    const entries = readdirSync(currentDir);

    for (const entry of entries) {
      const fullPath = join(currentDir, entry);
      const stat = statSync(fullPath);

      if (stat.isDirectory()) {
        scanDir(fullPath);
      } else if (stat.isFile()) {
        const ext = parse(entry).ext.toLowerCase();
        if (imageExtensions.includes(ext)) {
          files.push(fullPath);
        }
      }
    }
  }

  scanDir(dir);
  return files;
}
