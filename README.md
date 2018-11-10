# Login module for CodeIgniter 3

Self explainatory, this module provides user authentication functionality for CI Framework:
- Login
- Logout
- Session

Currently it allows only authentication using:
- In house user table from a database
- Gmail account authentication

## Setup

You need to setup your Google Console API key

1. Go to https://console.cloud.google.com/home/dashboard.
2. Pick APIs and Services > Credentials and follow the steps to Create New Credentials.
3. Once your credentials are created go back to APIs and Services > Credentials, your credentials should be listed, copy the Client ID.
4. Add the Client ID to config.php file like this
```
$config['google_oauth'] = 'your CLIENT ID';
```
5. You are all set.

## Author
mauricioabisay.lopez@gmail.com