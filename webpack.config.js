module.exports = {
    entry: "./src/index.js",
    output: {
        path: __dirname,
        filename: "./dist/bundle.js"
    },
    devtool: 'source-map',
    module: {
        loaders: [
        {
            test: /\.(js|jsx|tsx)$/,
            loader: "babel-loader",
            exclude: /node_modules/,
            options: {
            presets: [["env", "react"]],
            plugins: ["transform-class-properties"]
            }
        }
        ]
    }
};