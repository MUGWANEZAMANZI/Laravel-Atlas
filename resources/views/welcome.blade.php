<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Atlas</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

       <meta name="theme-color" content="#ffffff">

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="flex flex-col lg:flex-row min-h-screen">
            <aside class="w-full lg:w-64 bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700 p-6 flex-shrink-0 sticky top-0 h-screen overflow-y-auto">
                <h1 class="text-2xl font-semibold mb-6">Laravel Atlas Docs</h1>
                <nav>
                    <ul class="space-y-3 text-lg">
                        <li><a href="#intro" class="hover:underline text-zinc-700 dark:text-zinc-200">Introduction</a></li>
                        <li><a href="#github" class="hover:underline text-zinc-700 dark:text-zinc-200">Pushing to GitHub</a></li>
                        <li><a href="#deploy" class="hover:underline text-zinc-700 dark:text-zinc-200">Deploying to Railway</a></li>
                        <li><a href="#env" class="hover:underline text-zinc-700 dark:text-zinc-200">Environment Setup</a></li>
                        <li><a href="#dbvars" class="hover:underline text-zinc-700 dark:text-zinc-200">Database Variables</a></li>
                        <li><a href="#finish" class="hover:underline text-zinc-700 dark:text-zinc-200">Finishing Up</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="flex-1 p-6 lg:p-12 max-w-4xl mx-auto">
                <section id="intro" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Introduction</h2>
                    <p class="mb-2">Welcome to <span class="font-semibold">Laravel Atlas</span>! This guide helps you deploy Laravel apps using Railway, with a focus on environment setup and deployment best practices.</p>
                    <ul class="list-disc list-inside text-zinc-600 dark:text-zinc-300">
                        <li>Clean up your project and commit changes.</li>
                        <li>Push your code to GitHub (see next section).</li>
                        <li>Deploy and configure your app on Railway.</li>
                    </ul>
                </section>

                <section id="journey" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">My Deployment Journey & Tips</h2>
                    <p class="mb-2">Making deployment work required special attention to linking the database and the app. Here are some key lessons and tips from my experience:</p>
                    <ul class="list-disc list-inside text-zinc-600 dark:text-zinc-300 mb-2">
                        <li><span class="font-semibold">Database First:</span> You must set up your database (e.g., MySQL) before deploying your Laravel app. Railway will deploy your databases using Docker. If Docker status is down, you can build your Docker file and publish it from GitHub directly to your page.</li>
                        <li><span class="font-semibold">No Need for <code>composer run dev</code> in Production:</span> Railway handles asset building and deployment for you. Running <code>composer run dev</code> is not recommended in production.</li>
                        <li><span class="font-semibold">Project Expiry:</span> When you deploy, you may see a prompt that your project expires in 24 hours. Claim it by signing in with your GitHub account.</li>
                        <li><span class="font-semibold">Debugging 500 Errors:</span> If your project shows a 500 error, set <code>APP_DEBUG="true"</code> in your environment variables to see the issue. After fixing, always set <code>APP_DEBUG</code> back to <code>false</code> for security reasons.</li>
                        <li><span class="font-semibold">Fast & Easy Deployments:</span> Deployment with this platform is much faster and easier—thanks to Railway!</li>
                    </ul>
                    <p class="text-zinc-600 dark:text-zinc-300">Enjoy shipping your Laravel apps with confidence!</p>
                </section>
                <section id="github" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Pushing to GitHub</h2>
                    <ol class="list-decimal list-inside space-y-1 text-zinc-600 dark:text-zinc-300">
                        <li>Create a new repository on GitHub.</li>
                        <li>Initialize git and add your remote:
                            <pre class="bg-zinc-100 dark:bg-zinc-800 rounded p-2 text-sm overflow-x-auto mt-2">git init
git remote add main https://github.com/your-username/Laravel-Atlas.git</pre>
                        </li>
                        <li>Add, commit, and push your code:
                            <pre class="bg-zinc-100 dark:bg-zinc-800 rounded p-2 text-sm overflow-x-auto mt-2">git add .
git commit -m "first commit"
git push --set-upstream main master</pre>
                        </li>
                    </ol>
                </section>
                <section id="deploy" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Deploying to Railway</h2>
                    <ol class="list-decimal list-inside space-y-1 text-zinc-600 dark:text-zinc-300">
                        <li><span class="font-semibold">First, set up your database</span> (e.g., MySQL) in Railway. This is required before deploying your Laravel app.<br><img src="image.png" alt="MySQL Deploying" class="rounded shadow mt-2 mb-2 max-w-xs"/></li>
                        <li>Click <span class="font-semibold">Deploy</span> in Railway to start the deployment process.</li>
                        <li>Sign in with GitHub to claim your project if prompted.</li>
                        <li>Deploy your Laravel app from GitHub.<br><img src="image2.png" alt="Deploy App" class="rounded shadow mt-2 mb-2 max-w-xs"/></li>
                        <li>Railway will auto-detect your Laravel app and set up build/start commands.<br><img src="image3.png" alt="Railway Builder" class="rounded shadow mt-2 mb-2 max-w-xs"/></li>
                        <li>Optionally, add custom migrations or seeding commands as needed.</li>
                    </ol>
                </section>
                <section id="env" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Environment Setup</h2>
                    <p class="mb-2">After deployment, set up your environment variables in Railway:</p>
                    <ol class="list-decimal list-inside space-y-1 text-zinc-600 dark:text-zinc-300">
                        <li>Go to your Railway service, click <span class="font-semibold">Variables</span>, and use the raw editor.</li>
                        <li>Copy your <code>.env</code> file contents and paste them in the editor.</li>
                        <li>Update variables as needed. Example:</li>
                    </ol>
                    <pre class="bg-zinc-100 dark:bg-zinc-800 rounded p-2 text-xs overflow-x-auto mt-2">
APP_NAME="Laravel-Atlas"
APP_ENV="production"
APP_KEY="your key" # must be present
APP_DEBUG="false" # set to true for debugging
APP_URL="https://your-app.up.railway.app/"
DB_CONNECTION="mysql"
DB_HOST="mysql.railway.internal"
DB_PORT="3306"
DB_DATABASE="railway"
DB_USERNAME="root"
DB_PASSWORD="your_db_password"
SESSION_DRIVER="database"
# ...other variables
                    </pre>
                </section>
                <section id="dbvars" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Database Variables</h2>
                    <p class="mb-2">Ensure these variables match between your Laravel project and Railway database:</p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-zinc-200 dark:border-zinc-700 text-sm">
                            <thead class="bg-zinc-100 dark:bg-zinc-800">
                                <tr>
                                    <th class="p-2 border-b border-zinc-200 dark:border-zinc-700 text-left">Laravel .env</th>
                                    <th class="p-2 border-b border-zinc-200 dark:border-zinc-700 text-left">Railway DB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="p-2">DB_CONNECTION</td><td class="p-2">mysql</td></tr>
                                <tr><td class="p-2">DB_HOST</td><td class="p-2">mysql.railway.internal</td></tr>
                                <tr><td class="p-2">DB_PORT</td><td class="p-2">3306</td></tr>
                                <tr><td class="p-2">DB_DATABASE</td><td class="p-2">railway</td></tr>
                                <tr><td class="p-2">DB_USERNAME</td><td class="p-2">root</td></tr>
                                <tr><td class="p-2">DB_PASSWORD</td><td class="p-2">MYSQL_ROOT_PASSWORD</td></tr>
                                <tr><td class="p-2">SESSION_DRIVER</td><td class="p-2">database</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section id="finish" class="mb-12">
                    <h2 class="text-xl font-bold mb-2">Finishing Up</h2>
                    <ul class="list-disc list-inside text-zinc-600 dark:text-zinc-300">
                        <li>Open your generated domain (e.g., <span class="underline">your-app.up.railway.app</span>).</li>
                        <li>Your Laravel app should be running!</li>
                    </ul>
                </section>
            </main>
        </div>
    </body>
</html>
