@extends('layouts.master')

@section('judul', "{$title} Lembaga")

<style>
    .fw-300 {
        font-weight: 300;
    }

    .fw-400 {
        font-weight: 400;
    }

    .fw-500 {
        font-weight: 500;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fw-700 {
        font-weight: 700;
    }

    .bg-F2F2F2 {
        background: #F2F2F2;
    }

    .fc-CD9354 {
        color: #CD9354;
    }

    .text-E8BF70 {
        color: #E8BF70;
    }

    .of-cover {
        object-fit: cover
    }

    .of-contain {
        object-fit: contain
    }

    .of-hidden {
        overflow: hidden;
    }

    .ts-25-000 {
        text-shadow: 0 0 25px black;
    }

    .lg-00-05 {
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, .5));
    }

    .hover-bb-light {
        border-bottom: solid 1px transparent;
    }

    .hover-bb-light:hover {
        border-bottom: solid 1px #f8f9fa;
    }

    .hover-bb-dark {
        border-bottom: solid 1px transparent;
    }

    .hover-bb-dark:hover {
        border-bottom: solid 1px #212529;
    }

    .hover-bb-CD9354 {
        border-bottom: solid 2px transparent;
    }

    .hover-bb-CD9354:hover {
        border-bottom: solid 2px #CD9354;
    }

    .border-bottom-ccc {
        border-bottom: solid 1px #ccc;
    }

    .radius-respon {
        border-radius: 10px;
    }

    @media (min-width: 768px) {
        .radius-respon {
            border-radius: 15px;
        }
    }

    /* md */
    @media (min-width: 1200px) {
        .radius-respon {
            border-radius: 20px;
        }
    }

    /* xl */

    .fs-875-respon {
        font-size: 87.5%;
    }

    @media (min-width: 576px) {
        .fs-875-respon {
            font-size: 93.75%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        .fs-875-respon {
            font-size: 100%;
        }
    }

    /* md */
    * {
        font-family: 'Rubik', sans-serif;
        font-size: 100%;
        font-weight: 400;
    }

    html,
    body {
        background: white;
        color: #313131;
    }

    a {
        text-decoration: none;
    }

    header {
        /* border-top: solid 8px #E8BF70; */
        position: -webkit-sticky;
        /* Safari */
        position: sticky;
        top: 0;
        z-index: 9;
        background: rgba(255, 255, 255, .95);
    }

    @media (min-width: 992px) {

        /* lg */
        header {
            position: unset;
            top: unset;
            z-index: unset;
        }
    }

    header .logo img {
        width: 50px;
    }

    @media (min-width: 576px) {

        /* lg */
        header .logo img {
            width: unset;
        }
    }

    .searchbox {
        border: solid 1px #E8BF70;
        /* padding: 2px 2px 2px 8px; */
    }

    .searchbox .text {
        /* border: solid 1px #ccc; */
        border: 0 !important;
        outline: 0 !important;
        /* padding: 6px 10px 5px 12px; */
        color: #555;
        font-size: 93.75%;
        /* margin-right: 5px; */
        /* height: 30px; */
    }

    .searchbox .text:focus {
        border: 0 !important;
        outline: 0 !important;
    }

    .searchbox .tombol {
        border: 0;
        background: url('https://dprd.jabarprov.go.id/icon/search.png') center center no-repeat;
        height: 25px;
        width: 25px;
    }

    main {
        min-height: 250px;
    }

    .wrapall {
        width: 100%;
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
    }

    .bars {
        color: #E8BF70;
        background: transparent;
        font-size: 200%;
        border: 0;
        padding: 2px 8px 0 8px;
    }

    .bars:hover {
        background: #E8BF70;
        color: #fff;
    }

    .format-alis {
        background: #E8BF70;
        padding: 5px 20px;
        border-radius: 20px;
        font-weight: 500;
    }

    @media (min-width: 768px) {

        /* md */
        .format-alis {
            padding: 7px 30px;
            border-radius: 30px;
        }
    }

    .h1-page {
        font-size: 150%;
        line-height: 1.125;
    }

    @media (min-width: 340px) {
        .h1-page {
            line-height: 1.25;
        }
    }

    @media (min-width: 448px) {
        .h1-page {
            font-size: 175%;
        }
    }

    @media (min-width: 576px) {
        .h1-page {
            font-size: 200%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        .h1-page {
            font-size: 225%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        .h1-page {
            font-size: 250%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        .h1-page {
            font-size: 275%;
        }
    }

    /* xl */

    .love-button {
        text-align: right;
        position: relative;
        z-index: 1;
    }

    .love-button img {
        margin-top: -50px;
        width: 90px;
    }

    #cover .ratio-main {
        --bs-aspect-ratio: 65%;
    }

    @media (min-width: 448px) {
        #cover .ratio-main {
            --bs-aspect-ratio: 60%;
        }
    }

    @media (min-width: 576px) {
        #cover .ratio-main {
            --bs-aspect-ratio: 55%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #cover .ratio-main {
            --bs-aspect-ratio: 50%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        /* #cover .ratio-main { --bs-aspect-ratio: 60%; } */
    }

    /* lg */
    @media (min-width: 1200px) {
        /* #cover .ratio-main { --bs-aspect-ratio: 50%; } */
    }

    /* xl */

    #konten article {
        z-index: 1;
        position: relative;
        margin-top: -20px;
    }

    #konten article .judulsub {
        font-size: 125%;
    }

    #konten article .konten p {
        font-size: 112.5%;
        font-weight: 300;
    }

    @media (min-width: 768px) {

        /* md */
        #konten article {
            margin-top: -30px;
        }

        #konten article .judulsub {
            font-size: 137.5%;
        }

        #konten article .konten p {
            font-size: 125%;
        }
    }

    @media (min-width: 992px) {
        #konten article {
            margin-top: -40px;
        }
    }

    /* xl */

    @media (max-width: 319px) {
        header {
            border-bottom: solid 5px red;
        }

        footer {
            border-top: solid 5px red;
        }
    }

    #person_list a {
        width: 150px;
    }

    #person_list a .teks {
        font-size: 100%;
        line-height: 1.125;
    }

    @media (min-width: 448px) {
        #person_list a {
            width: 165px;
        }
    }

    @media (min-width: 576px) {

        /* sm */
        #person_list a {
            width: 165px;
        }

        /* #person_list a { width: 180px; } */
        /* #person_list a { width: 190px; } */
        #person_list a .teks {
            font-size: 112.5%;
            line-height: 1.25;
        }
    }

    @media (min-width: 768px) {

        /* md */
        #person_list a {
            width: 220px;
        }

        #person_list a .teks {
            font-size: 125%;
        }
    }

    @media (min-width: 992px) {

        /* lg */
        #person_list a {
            width: 220px;
        }
    }

    @media (min-width: 1200px) {

        /* xl */
        #person_list a {
            width: 270px;
        }
    }

    @media (min-width: 1400px) {
        /* xl */
        /* #person_list a { width: 320px; } */
    }

    .main_up {
        z-index: 1;
        position: relative;
        margin-top: -40px;
    }

    @media (min-width: 448px) {
        .main_up {
            margin-top: -50px;
        }
    }

    @media (min-width: 576px) {
        .main_up {
            margin-top: -60px;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        .main_up {
            margin-top: -70px;
        }
    }

    /* md */
    @media (min-width: 992px) {
        .main_up {
            margin-top: -80px;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        .main_up {
            margin-top: -90px;
        }
    }

    /* xl */
    @media (min-width: 1400px) {
        .main_up {
            margin-top: -100px;
        }
    }

    /* xxl */

    .pagina .index a {
        font-size: 125%;
        width: 35px;
        height: 35px;
        color: #313131;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .pagina div a:hover,
    .pagina div a.hover {
        background: #E8BF70;
        color: white;
    }

    .pagina hr {
        border: 1px solid #000;
    }

    @media (min-width: 576px) {

        /* sm */
        .pagina .index a {
            font-size: 137.5%;
            width: 45px;
            height: 45px;
        }
    }

    #fraksi .logo-party a {
        border: solid 2px white;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
    }

    #fraksi .logo-party a:hover {
        border: solid 2px #E8BF70;
    }

    .logo-party img {
        width: 150px;
    }

    @media (min-width: 576px) {
        .logo-party img {
            width: 190px;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        .logo-party img {
            width: 225px;
        }
    }

    /* md */
    @media (min-width: 992px) {
        .logo-party img {
            width: 230px;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        .logo-party img {
            width: 275px;
        }
    }

    /* xl */

    #foto a .teks,
    #video a .teks {
        font-size: 125%;
        line-height: 1.25;
    }

    @media (min-width: 448px) {

        #foto a .teks,
        #video a .teks {
            font-size: 137.5%;
        }
    }

    @media (min-width: 1200px) {

        /* md */
        #foto a .teks,
        #video a .teks {
            font-size: 150%;
        }
    }

    .share-page .medsos a {
        background: transparent;
        color: #777;
        border: solid 1px #777;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
        font-size: 112.5%;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .share-page .medsos a:hover {
        background: #777;
        color: white;
    }

    .icon-if {
        width: 125px;
        height: 125px;
    }

    @media (min-width: 768px) {
        .icon-if {
            width: 150px;
            height: 150px;
        }
    }

    /* md */
    @media (min-width: 1200px) {
        .icon-if {
            width: 175px;
            height: 175px;
        }
    }

    /* xl */

    footer #footer .medsos a {
        background: transparent;
        color: #E8BF70;
        border: solid 2px #E8BF70;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
        font-size: 137.5%;
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    footer #footer .medsos a:hover {
        background: #E8BF70;
        color: white;
    }

    @media (min-width: 448px) {}

    @media (min-width: 576px) {
        /* sm */
    }

    @media (min-width: 768px) {
        /* md */
    }

    @media (min-width: 992px) {
        /* lg */
    }

    @media (min-width: 1200px) {
        /* xl */
    }

    @media (min-width: 1400px) {
        /* xxl */
    }

    #nav>.wrapall>ul {
        list-style-type: none;
        display: flex;
        justify-content: space-between;
    }

    #nav ul {
        margin: 0;
        padding: 0;
    }

    #nav ul li.li1>a {
        color: #212529;
        /* dark | gray-900 */
        font-weight: 500;
        padding-bottom: 2px;
        border-bottom: solid 2px transparent;
        display: block;
    }

    #nav ul li.li1>a:hover,
    #nav ul li.li1.hover>a {
        border-bottom: solid 2px #E8BF70;
    }

    #nav ul li.li1 ul {
        display: none;
        position: absolute;
        /* width: 200px; */
        background: rgba(255, 255, 255, .95);
        border-radius: 10px;
        list-style-type: none;
    }

    #nav ul li.li2:first-child {
        padding-top: 15px;
    }

    #nav ul li.li2 {
        padding: 0 20px 15px 20px;
    }

    #nav ul li.li2>a {
        color: #000;
        /* dark | gray-900 */
        padding-bottom: 3px;
        border-bottom: solid 2px transparent;
        /* font-weight: 500; */
    }

    #nav ul li.li2>a:hover {
        border-bottom: solid 2px #E8BF70;
    }

    .offcanvas {
        width: 100%;
        max-width: 400px;
    }

    #navm {
        position: relative;
        /* margin: 50px; */
        /* width: 360px; */
        border-top: solid 1px #ddd;
        border-bottom: solid 1px #ddd;
    }

    #navm ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    #navm ul li {
        /* Sub Menu */
        border-top: solid 1px #ddd;
    }

    #navm ul li:first-child {
        border-top: solid 0 transparent;
    }

    #navm ul li a {
        display: block;
        /* background: #ebebeb; */
        padding: 8px 20px;
        /* color: #313131; */
        /* text-decoration: none; */
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;

        color: #212529;
        /* dark | gray-900 */
        /* font-weight: 500; */
        border-left: 6px solid transparent;
    }

    #navm ul li a:hover {
        background: #F2F2F2;
        /* color: #515151; */
        /* border-bottom: solid 2px #E8BF70; */
        border-left: 6px solid #E8BF70;
    }

    #navm ul li a .fas {
        /* width: 16px; */
        text-align: center;
        margin-right: 5px;
        float: right;
    }

    #navm ul ul {
        /* background-color:#ebebeb; */
        /* padding-left: 20px; */
    }

    #navm ul li ul li a {
        /* background: #f8f8f8; */
        /* border-left: 5px solid transparent; */
        padding: 8px 0 8px 35px;
    }

    #navm ul li ul li a:hover {
        /* background: #ebebeb; */
        /* border-left: 5px solid #ccc; */
    }

    #navm ul li.li1>a {
        color: #212529;
        /* dark | gray-900 */
        font-weight: 500;
    }

    #navm ul li.li2>a {
        color: #000;
        /* dark | gray-900 */
    }

    .carousel-control-prev-icon {
        background: url('https://dprd.jabarprov.go.id/image/gallery-prev-small.png');
        width: 42px;
        height: 42px;
    }

    .carousel-control-next-icon {
        background: url('https://dprd.jabarprov.go.id/image/gallery-next-small.png');
        width: 42px;
        height: 42px;
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-left: 5px;
        margin-right: 5px;
    }

    @media (min-width: 576px) {
        .carousel-control-prev-icon {
            background: url('https://dprd.jabarprov.go.id/image/gallery-prev-regular.png');
            width: 50px;
            height: 50px;
        }

        .carousel-control-next-icon {
            background: url('https://dprd.jabarprov.go.id/image/gallery-next-regular.png');
            width: 50px;
            height: 50px;
        }

        .carousel-indicators [data-bs-target] {
            margin-left: 10px;
            margin-right: 10px;
        }
    }

    @media (min-width: 1200px) {

        #photo .carousel-caption,
        #carouselbsekre .carousel-caption,
        #carouselbumum .carousel-caption {
            right: 50px;
            left: 50px;
        }

        #photo .carousel-control-next,
        #photo .carousel-control-prev,
        #carouselbsekre .carousel-control-next,
        #carouselbsekre .carousel-control-prev,
        #carouselbumum .carousel-control-next,
        #carouselbumum .carousel-control-prev {
            width: 50px;
        }

        #photo .carousel-control-prev,
        #carouselbsekre .carousel-control-prev,
        #carouselbumum .carousel-control-prev {
            margin-left: -25px;
        }

        #photo .carousel-control-next,
        #carouselbsekre .carousel-control-next,
        #carouselbumum .carousel-control-next {
            margin-right: -25px;
        }

        .carousel-indicators [data-bs-target] {
            margin-left: 15px;
            margin-right: 15px;
        }

    }

    #faq #cover .ratio-faq {
        --bs-aspect-ratio: 65%;
    }

    @media (min-width: 448px) {
        #faq #cover .ratio-faq {
            --bs-aspect-ratio: 60%;
        }
    }

    @media (min-width: 576px) {
        #faq #cover .ratio-faq {
            --bs-aspect-ratio: 55%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #faq #cover .ratio-faq {
            --bs-aspect-ratio: 50%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        /* #faq #cover .ratio-faq { --bs-aspect-ratio: 60%; } */
    }

    /* lg */
    @media (min-width: 1200px) {
        /* #faq #cover .ratio-faq { --bs-aspect-ratio: 50%; } */
    }

    /* xl */

    #detil_teks #kait .ratio {
        --bs-aspect-ratio: 75%;
    }

    @media (min-width: 448px) {
        #detil_teks #kait .ratio {
            --bs-aspect-ratio: 57%;
        }
    }

    @media (min-width: 576px) {
        /* #detil_teks #kait .ratio { --bs-aspect-ratio: 57%; } */
    }

    /* sm */
    @media (min-width: 768px) {
        #detil_teks #kait .ratio {
            --bs-aspect-ratio: 100%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        #detil_teks #kait .ratio {
            --bs-aspect-ratio: 90%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        #detil_teks #kait .ratio {
            --bs-aspect-ratio: 75%;
        }
    }

    /* xl */

    #detil_one #cover .ratio {
        --bs-aspect-ratio: 70%;
    }

    @media (min-width: 448px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 60%;
        }
    }

    @media (min-width: 576px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 56%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 52%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 48%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 44%;
        }
    }

    /* xl */
    @media (min-width: 1400px) {
        #detil_one #cover .ratio {
            --bs-aspect-ratio: 40%;
        }
    }

    /* xxl */

    .radius-respon-detil {
        border-radius: 0;
    }

    @media (min-width: 576px) {
        .radius-respon-detil {
            border-radius: 10px;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        .radius-respon-detil {
            border-radius: 15px;
        }
    }

    /* md */
    @media (min-width: 1200px) {
        .radius-respon-detil {
            border-radius: 20px;
        }
    }

    /* xl */

    #detil_one .haritanggal {
        font-size: 100%;
    }

    @media (min-width: 576px) {
        #detil_one .haritanggal {
            font-size: 112.5%;
        }
    }

    /* sm */
    @media (min-width: 768px) {
        #detil_one .haritanggal {
            font-size: 125%;
        }
    }

    /* md */

    #detil_one #konten article {
        z-index: 1;
        position: relative;
        margin-top: -20px;
    }

    #detil_one #konten article .judulsub {
        font-size: 125%;
    }

    #detil_one #konten article .konten p {
        font-size: 112.5%;
        font-weight: 300;
    }

    @media (min-width: 768px) {

        /* md */
        #detil_one #konten article {
            margin-top: -30px;
        }

        #detil_one #konten article .judulsub {
            font-size: 137.5%;
        }

        #detil_one #konten article .konten p {
            font-size: 125%;
        }
    }

    @media (min-width: 992px) {
        #detil_one #konten article {
            margin-top: -40px;
        }
    }

    /* xl */

    #detil_one .judulkait {
        font-size: 125%;
    }

    @media (min-width: 448px) {
        #detil_one .judulkait {
            font-size: 137.5%;
        }
    }

    @media (min-width: 576px) {
        /* #detil_one .judulkait { font-size: 137.5%; } */
    }

    /* sm */
    @media (min-width: 768px) {
        #detil_one .judulkait {
            font-size: 112.5%;
        }
    }

    /* md */
    @media (min-width: 992px) {
        #detil_one .judulkait {
            font-size: 125%;
        }
    }

    /* lg */
    @media (min-width: 1200px) {
        #detil_one .judulkait {
            font-size: 137.5%;
        }
    }

    /* xl */
</style>

@section('content')
    <main id="detil_one" class="bg-F2F2F2 pb-3 pb-md-4 pb-xl-5">

        <!-- cover begin -->
        <div id="cover">
            <div class="ratio text-white">
                <img src="{{ asset('img/ruangdprd.JPG') }}" class="of-cover " alt="dprdniasselatan">
                <div class="lg-00-05 px-md-5">
                    <div class="wrapall h-100">
                        <div class="pb-sm-3 pb-md-4 pb-lg-5 h-100 px-4 px-sm-5">
                            <div class="pb-5 d-flex flex-column justify-content-end h-100 p-lg-5">
                                <div class="px-lg-5">
                                    <div class="mb-2 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
                                        <div class="d-inline-block format-alis fs-875-respon">Profile DPRD</div>
                                    </div>
                                    <div class="h1-page fw-500 ts-25-000 mb-2 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
                                        {{ $title }}
                                    </div>

                                    <div class="d-flex align-items-center mb-xl-5">
                                        <a href="{{ route('frontend') }}"
                                            class="link-light ts-25-000 hover-bb-light">Home</a>
                                        <i class="fas fa-angle-right px-3"></i>
                                        <a href="{{ route('tugas-dprd') }}"
                                            class="link-light ts-25-000 hover-bb-light">Tugas Pokok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cover end -->

        <div class="px-sm-3 px-md-4 px-lg-5 pb-4 pb-sm-5">
            <div class="wrapall">
                <!-- konten begin -->
                <div id="konten" class="px-0 px-sm-4 px-md-5">
                    <div class="px-lg-5">

                        <article
                            class="pb-4 mb-4 pb-lg-5 mb-lg-5 bg-white radius-respon-detil shadow px-1 px-sm-2 px-md-3 px-lg-4 px-xl-5">
                            <div class="px-3 px-sm-4 px-lg-5">
                                <div class="love-button">
                                    <img src="{{ asset('img/love-button.png') }}" alt="">
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var $temp = $("<input>");
                                        var $url = $(location).attr('href');
                                        $('#btn').click(function() {
                                            $("#btn").append($temp);
                                            $temp.val($url).select();
                                            document.execCommand("copy");
                                            $temp.remove();
                                            $(".cetakurl").text("URL Berhasil di Copy!");
                                        });
                                    });
                                </script>
                                <div class="share-page mb-4 mb-lg-5">
                                    <div class="d-flex flex-column flex-sm-row align-items-start gap-2">
                                        <div class="me-4">
                                            Bagikan sekarang:
                                        </div>

                                        <div class="d-flex gap-2 gap-md-3 medsos">
                                            <a class="d-inline-flex justify-content-center align-items-center"
                                                title="Share to whatsapp"
                                                href="https://api.whatsapp.com/send?text={{ route('tugas-dprd') }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i></a>
                                            <a class="d-inline-flex justify-content-center align-items-center"
                                                title="Share to facebook"
                                                href="https://www.facebook.com/sharer.php?u={{ route('tugas-dprd') }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a class="d-inline-flex justify-content-center align-items-center"
                                                title="Share to twitter"
                                                href="https://twitter.com/share?url={{ route('tugas-dprd') }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a id="btn" type="button"
                                                class="d-inline-flex justify-content-center align-items-center"
                                                title="Silahkan klik untuk mencopy url dan kemudian silahkan bagikan..!!">
                                                <i class="fas fa-link"></i>
                                            </a>
                                            <p class="cetakurl"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-top border-secondary w-75 mb-4 mb-lg-5"></div>


                                <div class="konten">
                                    @forelse ($tugasdprd as $item)
                                        {!! $item->tugaspokok !!}
                                    @empty
                                        <div class="alert alert-warning alert-dismissible">
                                            <h6>
                                                <i class="fas fa-exclamation-triangle"></i> {{ $title }}masih
                                                kosong..!!
                                            </h6>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
