<!DOCTYPE html>
<html lang="tr_TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,200,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.svg#wf) format("svg");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.svg#wf) format("svg");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.svg#wf) format("svg");
            font-weight: 700;
            font-style: normal;
        }


        .search-box {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px auto 15px auto;
            font-size: 30px;
            padding: 14px 19px;
            border: 1px solid #C1C1C1;
            background-color: white;
            width: 19.8em;
            border-radius: 10px;
            transition: .2s
        }

        .search-box:hover {
            border-color: #AAAAAA;
        }



        input {
            font-family: Proxima Nova;
            letter-spacing: -0.2px;
            font-size: 30px;
            width: 18em !important;
            border: none;
            color: #121232;
        }

        button:hover {
            cursor: pointer;
        }

        input:focus {
            outline: none;
        }

        input::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        .clear:not(:valid)~.search-clear {
            display: none;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        iframe {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
       
            border-color: black;
            border-radius: 20px;
        }

        th,
        td {
            padding: 1rem 2rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: normal;
            font-size: .875rem;
            color: #666;
            background: #eee;
            position: sticky;
            top: 0;
        }

        img {
            width: 80px;
            display: block;
            margin: 0 auto;
            margin-bottom: .5rem;
        }

        @media(max-width: 500px) {
            .heading {
                display: none;
            }

            td {
                display: block;
            }

            .item-name {
                background: #eee;
            }
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-family: 'El Messiri', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">