# POKYmedia WordPress Theme

## Requirements
- [Node.js](https://nodejs.org)
- [npm](https://npmjs.org)
- [Wordpress instance](https://wordpress.org/download/)

## Installation

1. Install wordpress

1. Copy all contents of this repository into `/wp-content/themes`
1. Copy all contents of [POKYmedia must-use plugin](https://github.com/POKYmedia/pokymedia-wp_mu_plugins) into `/wp-content/mu-plugins`
1. Install dependencies

    ```
    npm install
    ```
1. Create `.env` file and customize  according to example configuration (`.env.example`).

## Usage

1. Run your wordpress instance

   ```
   php -S localhost:<port>
   ```

1. Build assets:

   ```
    npm run build
   ```
   
## Development

1. Run your wordpress instance

   ```
   php -S localhost:<port>
   ```

1. Run development server:

   ```
    npm run dev
   ```


