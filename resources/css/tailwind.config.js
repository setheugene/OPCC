module.exports = {
  content: [
    './components/**/*.{php,js,css}',
    './templates/**/*.php',
    './lib/**/*.php',
    './resources/**/*.{js,css}',
    './search.php',
    './index.php',
    './base.php',
    './404.php',
    './archive-lc_event.php',
    './archive-ll_faq.php',
    /*
     * Include files that have css classes that need to be rendered
     * Files and folders that don't exist should not be included
     * Below you will see some examples of files/paths that are not included and why and when to include them
     */
    // './page.php', // Include this line if you end up adding markup with classes to file
    // './single.php', // Include this line if you end up adding markup with classes to the file
    // './woocommerce/**/*.php', // Include this line if you end up adding woocommerce file overrides
    // './functions.php', // This file is not neccessary to include since it only holds references to all the other functions
    // './*.php', DO NOT INCLUDE THIS LINE
  ],
  safelist: [
    {
      pattern: /object-.+/
    },
    {
      pattern: /(my|mb|mt|mx|py|pb|pt|px)-.+/,
      variants: ['sm', 'md', 'lg', 'xl'],
    },
    {
      pattern: /w-\d{1,2}\/\d{1,2}/,
      variants: ['sm', 'md', 'lg', 'xl'],
    },
    {
      pattern: /w-.+/,
    },
    {
      pattern: /h-.+/,
    },
    /* To safelist more classes such as text color or background color use something like below, if not using bg-brand or text-brand and opting for text- or bg- keep in mind this whitelists classes such as bg-opacity, text-xl etc. */
    /* {
      pattern: /bg-brand-.+/
    } */
  ],
  theme: {
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      brand: {
        'black': '#17181B',
        'white': '#FBFBF7',
        'gray': '#6D6D6D',
        'medium-gray': '#ACACAC',
        'light-gray': '#D5D5D5',
        'eggplant': '#1B1C26',
        'plum': '#2C2F3F',
        'gold': '#8C6F3C',
        'beige': '#F3F1EA',
        'error': '#C80000',
        'filter-border': '#2B2B2B',
        'scrim': 'rgba(23, 24, 27, 0.65)',
      },
      form: {
        'placeholder': '#777777',
        'description': '#9C9C9C',
        'error': '#C80000',
        'focus': '#5A56F9',
        'radio-button-unchecked': '#4B4DED',
        'radio-button-checked': '#0500D7',
        'toggle-unchecked': '#EFEFFD',
        'toggle-checked': '#928FFF',
      },
      button: {
        DEFAULT: '#4B4DED',
        'hover': '#0500D7',
      }
    },
    fontFamily: {
      sans: [
        'proxima-nova',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
      serif: [
        'Butler',
        'serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ]
    },
    fontSize: {
      xs: 12 / 16 + 'rem',
      sm: 14 / 16 + 'rem',
      base: 16 / 16 + 'rem',
      lg: 18 / 16 + 'rem',
      xl: 20 / 16 + 'rem',
      '2xl': 24 / 16 + 'rem',
      '3xl': 32 / 16 + 'rem',
      '4xl': 36 / 16 + 'rem',
      '5xl': 44 / 16 + 'rem',
      '6xl': 64 / 16 + 'rem',
      '7xl': 80 / 16 + 'rem',
    },
    lineHeight: {
      none: '1',
      tighter: '1.1',
      tight: '1.2',
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1270px',
      xxl: '1440px',
    },
    container: {
      center: true,
      padding: {
        DEFAULT: 'calc( var(--gutter) * 2 )',
        lg: '3.125rem', // 50px
      }
    },
    extend: {
      spacing: {
        gutter: 'var(--gutter, 1rem )', // 16px
        'gutter-full': 'calc( var(--gutter) * 2 )', //32px
        '13': '3.25rem', //52px
        '18': '4.5rem', // 72px
        '22': '5.5rem', //88px
        '41': '10.25rem', //164px
      },
      // this section allows you to add more style class options without overwriting all the options for a single style option (for example the z-index and adding -1). You can reference tailwindcss version 3.1.7 docs to see how to extend specific config options not included below
      zIndex: {
        '-1': '-1'
      },
      backgroundImage: {
        // 'gradient-fade-tr': 'linear-gradient(71.24deg, #000000 20.76%, rgba(0, 0, 0, 0) 100%)', // custom gradient example. Usuage would be bg-gradient-fade-tr
      },
      boxShadow: {
        'form-focus': '0px 0px 0px 4px rgba(0, 0, 0, 0.25)',
      }
    },
  },
}
