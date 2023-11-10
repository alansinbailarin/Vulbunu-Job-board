<div class="container">
    <div class="body">
        <header class="header">
            <h1 class="title">Vulbunu Weekly Jobs</h1>
        </header>
        @foreach ($jobs as $job)
            <div class="job-card">
                <h2 class="job-title">{{ $job->title }}</h2>
                <p class="job-description">{{ $job->description }}</p>

                <a href="{{ url('/jobs/' . $job->slug) }}" class="job-link">See Job</a>
            </div>
        @endforeach
    </div>
</div>
<style>
    .container {
        max-width: 100%;
        padding: 1.5rem;
        margin: 0 auto;
        background-color: #f7f7f7;
        font-family: 'Arial', 'Helvetica', sans-serif;
    }

    .header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #343434;
    }

    .body {
        background-color: white;
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .job-card {
        margin-bottom: 1.5rem;
    }

    .job-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .job-description {
        font-size: 1rem;
        color: #555;
        margin-bottom: 1rem;
    }

    .job-link {
        font-size: 0.9rem;
        color: #007BFF;
        text-decoration: none;
        display: inline-block;
        transition: color 0.3s ease;
    }

    .job-link:hover {
        color: #0056b3;
    }
</style>
