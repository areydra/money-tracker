<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Money Tracker - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form
		action="<?= base_url('/login/submit') ?>"
		method="post"
		style="max-width: 600px;"
		class="w-25 rounded"
	>
        <div class="text-center mb-4">
            <h1>Money Tracker</h1>
        </div>

        <div class="form-group">
			<div class="input-group mb-3">
				<input
					required
					id="validationDefault01"
					type="text"
					name="username"
					placeholder="Username"
					class="form-control <?= isset($_SESSION["message_login_error"]) ? "is-invalid" : "" ?>"
				>
			</div>
			<div class="input-group mb-3">
				<input
					required
					id="validationDefault01"
					type="password"
					name="password"
					placeholder="Password"
					class="form-control <?= isset($_SESSION["message_login_error"]) ? "is-invalid" : "" ?>"
				/>
			</div>
            <input
                type="submit"
                class="btn btn-primary btn-block"
                value="Login"
            />
        </div>

        <p class="text-danger">
            <?= isset($_SESSION['message_login_error']) ? $_SESSION['message_login_error'] : '' ?>
        </p>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
