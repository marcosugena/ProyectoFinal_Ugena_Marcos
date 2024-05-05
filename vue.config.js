const { defineConfig } = require('@vue/cli-service')
const path = require('path');
module.exports = defineConfig({
  transpileDependencies: true,
  chainWebpack: config => {
    config.resolve.alias.set('@', path.resolve(__dirname, 'src'))
  },
  devServer: {
    proxy: 'http://localhost:8000'
  }
})
