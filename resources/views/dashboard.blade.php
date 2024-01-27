<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Add navigation links or other sidebar content here -->
            <p>Sidebar</p>
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('companies.index') }}">Companies</a>
            <a href="{{ route('employees.index') }}">Employees</a>

        </div>

        <!-- Content Area -->
        <div class="content">

            <!-- Site Statistics Section -->
            <div class="stats-section">
                <h2>Site Statistics</h2>
                <div class="stats-box"><label>Total Users:</label>
                    <span class="stat-number">{{ isset($userCount) ? $userCount : 0 }}</span>
                </div>
                <div class="stats-box"><label>Total Books:</label>
                    <span class="stat-number">{{ isset($bookCount) ? $bookCount : 0 }}</span>
                </div>
                <div class="stats-box"><label>Total reviews:</label>
                    <span class="stat-number">{{ isset($reviewCount) ? $reviewCount : 0 }}</span>
                </div>

                <!-- Add more statistics boxes as needed -->
            </div>

            <!-- User Activity Monitoring Section -->
            {{-- <div class="activity-section">
                <h2>User Activity Monitoring</h2>

                <!-- Recent User Activity Table -->
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th>comment</th>
                            <th>Last Logged In</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($userActivity as $activity)
                            <tr>
                                <td>{{ $activity->user->name }}</td>
                                <td>{{ $activity->user->email }}</td>
                                <td>Book Reviewed Since {{ $activity->user->created_at->diffForHumans() }}</td>
                                <td>{{ $activity->comment }}</td>
                                <td>{{ $activity->user->last_login_at->diffForHumans() ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <span>No </span>
                        @endforelse

                    </tbody>
                </table>
            </div> --}}

        </div>

    </div>

</x-app-layout>
