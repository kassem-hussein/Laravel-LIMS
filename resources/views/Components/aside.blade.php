<aside id="lims_slider" class="lims-slider">
    <div class="logo">LIMS</div>
    <div class="aside-container">
        <div class="links">
            <div class="link-container">
                <i class="bi bi-grid-fill"></i>
                <a href="/" class="nav-link">Dashboard</a>
            </div>
            @if(Auth::user()->role != 'Nurse')
                <div>
                    <div class="link-container">
                        <i class="fa-solid fa-vials"></i>
                        <a href="/tests" class="nav-link">Tests</a>
                        <div class="dropdown-button">
                            <i  class="aside-arrow fa-solid fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="dropmenu-items dropmenu-items-hidden">
                        <div class="link-container">
                            <i class="bi bi-p-circle"></i>
                            <a href="/parameters" class="nav-link">Paramaters</a>
                        </div>
                        <div class="link-container ">
                            <i class="bi bi-box"></i>
                            <a href="/groups" class="nav-link">Groups</a>
                        </div>
                    </div>
                </div>
            @endif
            <div>
                <div class="link-container">
                    <i class="fa-solid fa-person-booth"></i>
                    <a href="/visits" class="nav-link">Visits</a>
                    <div class="dropdown-button">
                        <i class="aside-arrow fa-solid fa-caret-right"></i>
                    </div>
                </div>
                <div class="dropmenu-items dropmenu-items-hidden">
                    <div class="link-container">
                        <i class="fa-solid fa-vial"></i>
                        <a href="/samples" class="nav-link">Samples</a>
                    </div>
                </div>
            </div>
            <div class="link-container">
                <i class="fa-solid fa-hospital-user"></i>
                <a href="/patients" class="nav-link">Patients</a>
            </div>
            <div>
                <div class="link-container">
                    <i class="fa-solid fa-coins"></i>
                    <a href="" class="nav-link">Finance</a>
                    <div class="dropdown-button">
                        <i class="aside-arrow fa-solid fa-caret-right"></i>
                    </div>
                </div>
                <div class="dropmenu-items dropmenu-items-hidden">
                    <div class="link-container">
                        <i class="fa-solid fa-arrow-down"></i>
                        <a href="/expenditure" class="nav-link">Expenditure</a>
                    </div>
                    <div class="link-container">
                        <i class="fa-solid fa-arrow-up"></i>
                        <a href="/revenue" class="nav-link">Revenue</a>
                    </div>
                </div>
            </div>
            <div class="link-container">
                <i class="fa-solid fa-box-archive"></i>
                <a href="/materials" class="nav-link">Materials</a>
            </div>
            @if (Auth::user()->role == 'Admin')
                <div class="link-container">
                    <i class="fa-solid fa-user"></i>
                    <a href="/users" class="nav-link">Users</a>
                </div>
            @endif
        </div>
    </div>

</aside>

