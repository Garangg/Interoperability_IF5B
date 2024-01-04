<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Employee List</title>
</head>

<body class="bg-gray-100 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full md:w-3/4 my-8 mx-10">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-10 text-center">Employee List</h1>
            <div class="">
                <a href="/employees/create" class="mb-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">Add Employee</a>
            </div>
            <table class="table-auto w-full border text-center mx-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Salary</th>
                        <th class="px-4 py-2">Age</th>
                        <!-- <th class="px-4 py-2">Profile Image</th> -->
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($response['data'] as $employee) : ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $employee['id'] ?></td>
                            <td class="border px-4 py-2"><?= $employee['employee_name'] ?></td>
                            <td class="border px-4 py-2"><?= $employee['employee_salary'] ?></td>
                            <td class="border px-4 py-2"><?= $employee['employee_age'] ?></td>
                            <!-- <td class="border px-4 py-2"><img src="<?= $employee['profile_image'] ?>" alt="Profile Image" width="50"></td> -->
                            <td class="border px-4 py-2">
                                <a href="/employees/<?= $employee['id'] ?>">
                                    <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Detail</button>
                                </a>
                                <a href="/employees/edit/<?= $employee['id'] ?>">
                                    <button class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-700">Edit</button>
                                </a>
                                <a href="/employees/delete/<?= $employee['id'] ?>">
                                    <button class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>