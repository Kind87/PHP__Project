<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/helloStyle.css') }}">
    <title>test123</title>
</head>

<body>

    @include('partials.navbar')

    <div class="Guestcontainer">

        <div class="content">
            <h1>討論版</h1>
            <div class="seachCreate">
                <form class="search">
                    <input type="text" id="userSearch" placeholder="請輸入文章內容">
                    <button class="searchIcon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <button class="openCreate">發表文章</button>
            </div>
            <div id="messages"></div>
        </div>
    </div>
    <div class="modalShelter modalHidden">
    </div>
    <div class="createModal">
        <h2>建立文章</h2>
        <form class="createForm">
            <div class="fromGap">
                <label for="userComment">文章</label>
                <input type="text" name="userComment" id="userComment">
                <label for="userName">姓名</label>
                <input type="text" name="userName" id="userName">
            </div>

            <button class="createBtn">新增文章</button>
        </form>
    </div>
    <div class="editModal">
        <h2>編輯文章</h2>
        <form class="editFrom">
            <div class="fromGap">
                <label for="editComment">文章</label>
                <input type="text" name="editComment" id="editComment">
                <label for="editName">姓名</label>
                <input type="text" name="editName" id="editName">
            </div>
            <button class="upComment">更新文章</button>
        </form>
    </div>
    <script src="{{ asset('js/hello.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>