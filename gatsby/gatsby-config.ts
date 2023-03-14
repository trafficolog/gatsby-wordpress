import type { GatsbyConfig } from "gatsby";

const config: GatsbyConfig = {
  siteMetadata: {
    title: `gatsby-ts`,
    siteUrl: `https://resheno.pro`
  },
  plugins: [
    "gatsby-plugin-sharp",
    "gatsby-transformer-sharp",
    "gatsby-plugin-sass",
    "gatsby-plugin-image",
    "gatsby-plugin-react-helmet",
    {
      resolve: 'gatsby-plugin-apollo',
      options: {
        uri: "http://localhost:8000/graphql"
      }
    },
    {
      resolve: 'gatsby-source-wordpress',
      options: {
        "url": process.env.WORDPRESS_URL
      }
    },
    {
      resolve: 'gatsby-plugin-manifest',
      options: {
        "icon": "src/images/icon.png"
      }
    },
    {
      resolve: 'gatsby-source-filesystem',
      options: {
        "name": "images",
        "path": "./src/images/"
      },
    },
  ],
};

export default config;
