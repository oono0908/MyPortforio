import { defineConfig } from 'vite';
import { resolve } from 'path';
import vitePluginWebp from './vite-plugin-webp.js';

export default defineConfig({
  plugins: [
    vitePluginWebp({
      quality: 80,
      srcDir: 'src/images',
      destDir: 'images'
    })
  ],

  build: {
    outDir: 'assets',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        // JavaScript (フォルダ構造を維持)
        'js/main': resolve(__dirname, 'src/js/main.js'),
        'js/common/script': resolve(__dirname, 'src/js/common/script.js'),
        'js/about/script': resolve(__dirname, 'src/js/about/script.js'),
        'js/contact/script': resolve(__dirname, 'src/js/contact/script.js'),
        'js/top/script': resolve(__dirname, 'src/js/top/script.js'),

        // CSS files
        'css/common/style': resolve(__dirname, 'src/scss/common/style.scss'),
        'css/about/style': resolve(__dirname, 'src/scss/about/style.scss'),
        'css/contact/style': resolve(__dirname, 'src/scss/contact/style.scss'),
        'css/top/style': resolve(__dirname, 'src/scss/top/style.scss'),
      },
      output: {
        entryFileNames: (chunkInfo) => {
          // JSファイルの出力
          return '[name].js';
        },
        assetFileNames: (assetInfo) => {
          // CSSファイルの出力（入力時のキー名を使用）
          return '[name][extname]';
        },
        chunkFileNames: 'js/[name]-[hash].js'
      }
    },
    sourcemap: true
  },
  css: {
    devSourcemap: true
  },
  base: './'
});
