<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Employee Details</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg shadow-lg w-full md:w-3/4 lg:w-3/5">
        <div class="p-8">
            <div class="">
                <a href="/employees" class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Go Back</a>
            </div>
            <h1 class="text-2xl font-bold mb-4 text-center">Employee Details</h1>
            
            <table class="table-auto w-full">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">ID</td>
                        <td class="border px-4 py-2"><?= $response['data']['id'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Name</td>
                        <td class="border px-4 py-2"><?= $response['data']['employee_name'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Salary</td>
                        <td class="border px-4 py-2"><?= $response['data']['employee_salary'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Age</td>
                        <td class="border px-4 py-2"><?= $response['data']['employee_age'] ?></td>
                    </tr>
                    <!-- <tr>
                        <td class="border px-4 py-2">Profile Image</td>
                        <td class="border px-4 py-2"><img src="<?= $response['data']['profile_image'] ?>" alt="Profile Image" width="50"></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>