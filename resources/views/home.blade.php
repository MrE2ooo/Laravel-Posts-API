<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post API Documentation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Post API Documentation</h1>

        <!-- Authentication Routes -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2>1. Authentication Routes</h2>
            </div>
            <div class="card-body">
                <!-- Register a New User -->
                <div class="mb-4">
                    <h3>Register a New User</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/register</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "is_admin": false,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    "token": "1|randomTokenString"
}</code></pre>
                </div>

                <!-- Register a New Admin User -->
                <div class="mb-4">
                    <h3>Register a New Admin User</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/register</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "name": "Admin User",
    "email": "admin@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "is_admin": true
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "user": {
        "id": 2,
        "name": "Admin User",
        "email": "admin@example.com",
        "is_admin": true,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    "token": "2|randomTokenString"
}</code></pre>
                </div>

                <!-- Log in a User -->
                <div class="mb-4">
                    <h3>Log in a User</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/login</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "email": "john@example.com",
    "password": "password123"
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "is_admin": false,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    "token": "1|randomTokenString"
}</code></pre>
                </div>

                <!-- Log out a User -->
                <div class="mb-4">
                    <h3>Log out a User</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/logout</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Request Body:</strong> (None)</p>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "message": "Logged out successfully"
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Post Routes -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h2>2. Post Routes</h2>
            </div>
            <div class="card-body">
                <!-- Get All Posts -->
                <div class="mb-4">
                    <h3>Get All Posts (Authenticated User Only)</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/posts</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>[
    {
        "id": 1,
        "title": "First Post",
        "body": "This is the body of the first post.",
        "user_id": 1,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    {
        "id": 2,
        "title": "Second Post",
        "body": "This is the body of the second post.",
        "user_id": 2,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    }
]</code></pre>
                </div>

                <!-- Get a Single Post -->
                <div class="mb-4">
                    <h3>Get a Single Post</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/posts/{post_id}</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 1,
    "title": "First Post",
    "body": "This is the body of the first post.",
    "user_id": 1,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>

                <!-- Create a New Post -->
                <div class="mb-4">
                    <h3>Create a New Post</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/posts</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "title": "New Post",
    "body": "This is the body of the new post."
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 3,
    "title": "New Post",
    "body": "This is the body of the new post.",
    "user_id": 1,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>

                <!-- Update a Post -->
                <div class="mb-4">
                    <h3>Update a Post</h3>
                    <p><strong>Endpoint:</strong> <code>PUT /api/posts/{post_id}</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "title": "Updated Post Title",
    "body": "This is the updated body of the post."
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 1,
    "title": "Updated Post Title",
    "body": "This is the updated body of the post.",
    "user_id": 1,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>

                <!-- Delete a Post -->
                <div class="mb-4">
                    <h3>Delete a Post</h3>
                    <p><strong>Endpoint:</strong> <code>DELETE /api/posts/{post_id}</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "message": "the post was deleted"
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Admin Routes -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-white">
                <h2>3. Admin Routes</h2>
            </div>
            <div class="card-body">
                <!-- Get All Users -->
                <div class="mb-4">
                    <h3>Get All Users (Admin Only)</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/admin/users</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;admin_token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>[
    {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "is_admin": false,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    {
        "id": 2,
        "name": "Admin User",
        "email": "admin@example.com",
        "is_admin": true,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    }
]</code></pre>
                </div>

                <!-- Get a Single User -->
                <div class="mb-4">
                    <h3>Get a Single User (Admin Only)</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/admin/users/{user_id}</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;admin_token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "is_admin": false,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>

                <!-- Delete a User -->
                <div class="mb-4">
                    <h3>Delete a User (Admin Only)</h3>
                    <p><strong>Endpoint:</strong> <code>DELETE /api/admin/users/{user_id}</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;admin_token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "message": "User deleted successfully"
}</code></pre>
                </div>

                <!-- Get All Posts for a Specific User -->
                <div class="mb-4">
                    <h3>Get All Posts for a Specific User (Admin Only)</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/admin/users/{user_id}/posts</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;admin_token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>[
    {
        "id": 1,
        "title": "First Post",
        "body": "This is the body of the first post.",
        "user_id": 1,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    },
    {
        "id": 2,
        "title": "Second Post",
        "body": "This is the body of the second post.",
        "user_id": 1,
        "created_at": "2023-10-10T12:00:00.000000Z",
        "updated_at": "2023-10-10T12:00:00.000000Z"
    }
]</code></pre>
                </div>

                <!-- Create a Post for a Specific User -->
                <div class="mb-4">
                    <h3>Create a Post for a Specific User (Admin Only)</h3>
                    <p><strong>Endpoint:</strong> <code>POST /api/admin/users/{user_id}/posts</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;admin_token&gt;</code></li>
                    </ul>
                    <p><strong>Request Body:</strong></p>
                    <pre><code>{
    "title": "Admin-Created Post",
    "body": "This post was created by the admin."
}</code></pre>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 3,
    "title": "Admin-Created Post",
    "body": "This post was created by the admin.",
    "user_id": 1,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>
            </div>
        </div>

        <!-- User Routes -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h2>4. User Routes</h2>
            </div>
            <div class="card-body">
                <!-- Get Authenticated User -->
                <div class="mb-4">
                    <h3>Get Authenticated User</h3>
                    <p><strong>Endpoint:</strong> <code>GET /api/user</code></p>
                    <p><strong>Headers:</strong></p>
                    <ul>
                        <li><code>Content-Type: application/json</code></li>
                        <li><code>Authorization: Bearer &lt;token&gt;</code></li>
                    </ul>
                    <p><strong>Response:</strong></p>
                    <pre><code>{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "is_admin": false,
    "created_at": "2023-10-10T12:00:00.000000Z",
    "updated_at": "2023-10-10T12:00:00.000000Z"
}</code></pre>
                </div>