@extends('layouts.admin')

@section('content')
<main class="content">
        <header class="top-header">
            <div class="welcome">
                <h1>Welcome Back, <span>Admin</span></h1>
                <p>Here's what's happening today.</p>
            </div>
            <div class="user-profile">
                <div class="user-info">
                    <p class="user-name">Super Admin</p>
                    <p class="user-status">Online</p>
                </div>
                <div class="user-avatar">AD</div>
            </div>
        </header>

        <div class="stats-container">
            <div class="stat-box">
                <p class="stat-label">TOTAL MEMBERS</p>
                <h2 class="stat-value">1,254</h2>
                <p class="stat-trend">↑ 12% increase</p>
            </div>
            <div class="stat-box">
                <p class="stat-label">ACTIVE TRAINERS</p>
                <h2 class="stat-value">15</h2>
                <p class="stat-trend green">On Duty</p>
            </div>
            <div class="stat-box">
                <p class="stat-label">MONTHLY REVENUE</p>
                <h2 class="stat-value">$12,450</h2>
                <p class="stat-trend">↑ 8% from last month</p>
            </div>
            <div class="stat-box">
                <p class="stat-label">ACTIVE SESSIONS</p>
                <h2 class="stat-value">42</h2>
                <p class="stat-trend green">Live Now</p>
            </div>
        </div>

        <div class="table-section">
            <div class="table-header">
                <h3>Recent Memberships</h3>
                <button class="add-member-btn">+ ADD MEMBER</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>PLAN</th>
                        <th>JOIN DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Elite Plan</td>
                        <td>Oct 12, 2025</td>
                        <td><span class="badge active">Active</span></td>
                        <td><button class="btn-edit">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Sarah</td>
                        <td>Pro Plan</td>
                        <td>Oct 10, 2025</td>
                        <td><span class="badge active">Active</span></td>
                        <td><button class="btn-edit">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Arif</td>
                        <td>Basic Plan</td>
                        <td>Sept 28, 2025</td>
                        <td><span class="badge expired">Expired</span></td>
                        <td><button class="btn-edit">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
