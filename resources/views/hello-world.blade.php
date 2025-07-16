<!DOCTYPE html>
<html lang="en">

<head>
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
            <h1>留言板</h1>
            <div class="seachCreate">
                <form class="search">
                    <input type="text" id="userSearch" placeholder="請輸入留言內容">
                    <button class="searchIcon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <button class="openCreate">建立留言</button>
            </div>
            <div id="messages"></div>
        </div>
    </div>
    <div class="modalShelter modalHidden">
    </div>
    <div class="createModal">
        <h2>建立留言</h2>
        <form class="createForm">
            <div class="createRow">
                <label for="userName">姓名</label>
                <input type="text" name="userName" id="userName">
            </div>
            <div class="createRow">
                <label for="userComment">留言</label>
                <input type="text" name="userComment" id="userComment">
            </div>
            <button class="createBtn">新增留言</button>
        </form>
    </div>
    <div class="editModal">
        <h2>編輯留言</h2>
        <form class="editFrom">
            <label for="editName">姓名</label>
            <input type="text" name="editName" id="editName">
            <label for="editComment">留言</label>
            <input type="text" name="editComment" id="editComment">
            <button class="upComment">更新留言</button>
            <form>
    </div>
    <script src="{{ asset('js/hello.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>