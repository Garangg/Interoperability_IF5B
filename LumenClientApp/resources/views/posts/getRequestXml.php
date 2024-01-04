<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Post</title>
</head>

<body>
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                <h1 class="text-2xl font-bold mb-4 text-center">List Post</h1>
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow overflow-x-auto bg-white border border-gray-200 p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($response as $post) : ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $post['id'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $post['title'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $post['content'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $post['created_at'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $post['updated_at'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</body>

</html>