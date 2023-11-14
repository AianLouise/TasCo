export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};

const path = require('path');

// postcss.config.js
module.exports = {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
      'postcss-preset-env': {
        stage: 1,
        autoprefixer: {
          grid: true,
          flexbox: 'no-2009',
        },
      },
    },
    rules: [
        {
          test: /\.css$/,
          use: ['style-loader', 'css-loader', 'postcss-loader'],
        },
      ],
  };
  