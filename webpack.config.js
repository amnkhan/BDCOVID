var webpack = require('webpack');
const path = require('path');

const isDevelopment = process.env.NODE_ENV === 'development'
module.exports =
    {
        "mode": "production",
        "entry": {
            "scripts.js": "./js/scripts.js",
        },
        "output": {
            "path": __dirname+"/dist",
            "filename": "[name]"
        },
        "devtool": "source-map",
        "module": {
            "rules": [
                {
                    "test": /\.js$/,
                    "exclude": /node_modules/,
                    "use": {
                        "loader": "babel-loader",
                        "options": {
                            "presets": [
                                "env"
                            ]
                        }
                    }
                }

            ]
        },
        "plugins": [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
                'window.$': 'jquery'
            }),
        ]
    };