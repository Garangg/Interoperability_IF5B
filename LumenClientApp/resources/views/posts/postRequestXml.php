<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Post Detail</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg shadow-lg w-full md:w-3/4 lg:w-1/2">
        <div class="p-8">
            <div class="">
                <button onclick="goBack()" class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Go Back</button>
            </div>
            <h1 class="text-5xl font-bold mb-6 text-center">Post Detail</h1>
            <table class="table-auto w-full">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Title</td>
                        <td class="border px-4 py-2"><?= $response['data']['title'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Author</td>
                        <td class="border px-4 py-2"><?= $response['data']['author'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Category</td>
                        <td class="border px-4 py-2"><?= $response['data']['category'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Status</td>
                        <td class="border px-4 py-2"><?= $response['data']['status'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Content</td>
                        <td class="border px-4 py-2"><?= $response['data']['content'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Image</td>
                        <td class="border px-4 py-2"><img src="http://localhost:8000/posts/image/<?= $response['data']['image'] ?>" width="200"></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Video</td>
                        <td class="border px-4 py-2"><video controls src="http://localhost:8000/posts/video/<?= $response['data']['video'] ?>" width="200"></video></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Created at</td>
                        <td class="border px-4 py-2"><?= $response['data']['created_at'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-bold">Updated at</td>
                        <td class="border px-4 py-2"><?= $response['data']['updated_at'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>