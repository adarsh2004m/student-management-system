<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Department Section -->
    <li class="nav-item has-treeview menu-open">
      <a href="#" class="nav-link bg-primary">
        <i class="nav-icon fas fa-university"></i>
        <p>
          Department
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="dadd.php" class="nav-link">
            <i class="nav-icon fas fa-plus-circle"></i>
            <p>Add Department</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="ddelete.php" class="nav-link">
            <i class="nav-icon fas fa-trash-alt"></i>
            <p>Delete Department</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Subject Section -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link bg-info">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Subject
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="sadd.php" class="nav-link">
            <i class="nav-icon fas fa-plus-circle"></i>
            <p>Add Subject</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sdelete.php" class="nav-link">
            <i class="nav-icon fas fa-trash-alt"></i>
            <p>Delete Subject</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- HOD Section -->
    <li class="nav-item">
      <a href="ahod.php" class="nav-link bg-success">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Manage HOD</p>
      </a>
    </li>

    <!-- Teacher Verification -->
    <li class="nav-item">
      <a href="vteach.php" class="nav-link bg-warning">
        <i class="nav-icon fas fa-user-check"></i>
        <p>Verify Teachers</p>
      </a>
    </li>

    <!-- Parent Section -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link bg-purple">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Parent Management
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="add_parent.php" class="nav-link">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>Add Parent</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="view_parent.php" class="nav-link">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>Edit Parents</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>