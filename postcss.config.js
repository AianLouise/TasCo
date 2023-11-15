export default {
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
};