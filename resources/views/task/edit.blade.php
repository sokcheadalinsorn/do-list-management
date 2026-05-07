<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit form</title>
</head>
<body>
    
    <div class="flex items-center justify-center">
        <div class="">

        </div>
    </div>


</body>
</html><script>
        // --- JavaScript CRUD Logic ---
        let users = JSON.parse(localStorage.getItem('users')) || [];
        const form = document.getElementById('crudForm');
        const userTableBody = document.getElementById('userTableBody');

        // Read & Render
        function renderTable() {
            userTableBody.innerHTML = '';
            users.forEach((user, index) => {
                userTableBody.innerHTML += `
                    <tr>
                        <td class="border-b p-2">${user.name}</td>
                        <td class="border-b p-2">${user.email}</td>
                        <td class="border-b p-2">
                            <button onclick="editUser(${index})" class="text-yellow-500 mr-2">Edit</button>
                            <button onclick="deleteUser(${index})" class="text-red-500">Delete</button>
                        </td>
                    </tr>
                `;
            });
            localStorage.setItem('users', JSON.stringify(users));
        }

        // Create & Update
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const id = document.getElementById('userId').value;
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;

            if (id) {
                users[id] = { name, email }; // Update
            } else {
                users.push({ name, email }); // Create
            }
            form.reset();
            document.getElementById('userId').value = '';
            renderTable();
        });

        // Edit (Prepare Update)
        window.editUser = (index) => {
            document.getElementById('userId').value = index;
            document.getElementById('userName').value = users[index].name;
            document.getElementById('userEmail').value = users[index].email;
        }

        // Delete
        window.deleteUser = (index) => {
            users.splice(index, 1);
            renderTable();
        }

        renderTable(); // Initial load
    </script>