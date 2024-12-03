<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="d-flex align-items-center">
  <h1 class="mr-2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
  <small class="text-muted">Overview of the application</small>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <!-- Total Pengunjung Hari Ini -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header text-black">
        <h3 class="card-title-graph">Total Pengunjung Hari Ini</h3>
      </div>
      <div class="card-body">
        <h4 class="mb-3">12</h4>
        <canvas id="todayVisitorsChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Total Pengunjung Bulan Ini -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header text-black">
        <h3 class="card-title">Total Pengunjung Bulan Ini</h3>
      </div>
      <div class="card-body">
        <h4 class="mb-3">93</h4>
        <canvas id="monthVisitorsChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- 100 Situs yang Sering Dikunjungi -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header text-black">
        <h3 class="card-title">100 Situs yang Sering Dikunjungi</h3>
      </div>
      <div class="card-body">
        <table id="frequentSitesTable" class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>URL</th>
              <th>Total Dikunjungi</th>
              <th>Total Visitor</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td><a href="https://pkm.sman1balige.delcom.org" target="_blank">https://pkm.sman1balige.delcom.org</a></td><td>163</td><td>143</td></tr>
            <tr><td>2</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/sejarah" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/sejarah</a></td><td>39</td><td>33</td></tr>
            <tr><td>3</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/ppdb" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/ppdb</a></td><td>28</td><td>24</td></tr>
            <tr><td>4</td><td><a href="http://pkm.sman1balige.delcom.org" target="_blank">http://pkm.sman1balige.delcom.org</a></td><td>28</td><td>28</td></tr>
            <tr><td>5</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/berita" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/berita</a></td><td>19</td><td>15</td></tr>
            <tr><td>6</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/visi-misi" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/visi-misi</a></td><td>17</td><td>15</td></tr>
            <tr><td>7</td><td><a href="https://pkm.sman1balige.delcom.org/web/sapras/1" target="_blank">https://pkm.sman1balige.delcom.org/web/sapras/1</a></td><td>15</td><td>15</td></tr>
            <tr><td>8</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/prestasi" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/prestasi</a></td><td>14</td><td>14</td></tr>
            <tr><td>9</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/galeri" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/galeri</a></td><td>14</td><td>14</td></tr>
            <tr><td>10</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/struktur-organisasi" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/struktur-organisasi</a></td><td>12</td><td>10</td></tr>
            <tr><td>11</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/program-sekolah" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/program-sekolah</a></td><td>9</td><td>8</td></tr>
            <tr><td>12</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/staff" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/staff</a></td><td>8</td><td>8</td></tr>
            <tr><td>13</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/arsip" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/arsip</a></td><td>8</td><td>7</td></tr>
            <tr><td>14</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/hubungi-kami" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/hubungi-kami</a></td><td>6</td><td>5</td></tr>
            <tr><td>15</td><td><a href="https://pkm.sman1balige.delcom.org/web/profil/alumni" target="_blank">https://pkm.sman1balige.delcom.org/web/profil/alumni</a></td><td>4</td><td>4</td></tr>
            <tr><td>16</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/berita/2" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/berita/2</a></td><td>2</td><td>2</td></tr>
            <tr><td>17</td><td><a href="https://pkm.sman1balige.delcom.org/web/informasi/berita/1" target="_blank">https://pkm.sman1balige.delcom.org/web/informasi/berita/1</a></td><td>1</td><td>1</td></tr>
            <tr><td>18</td><td><a href="http://pkm.sman1balige.delcom.org/web/profil/struktur-organisasi" target="_blank">http://pkm.sman1balige.delcom.org/web/profil/struktur-organisasi</a></td><td>1</td><td>1</td></tr>
            <tr><td>19</td><td><a href="http://pkm.sman1balige.delcom.org/web/profil/prestasi" target="_blank">http://pkm.sman1balige.delcom.org/web/profil/prestasi</a></td><td>1</td><td>1</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
  /* Customize the appearance of the dashboard */
  .content-header {
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
  }

  .card-header {
    font-weight: bold;
  }

  .card-body p {
    margin: 0;
  }

  .card-title {
     font-size: 24px;
  }

  .card-body th {
    background-color: #CFE2FF;
  }

  /* Add slight borders to the table cells */
  #frequentSitesTable, #frequentSitesTable th, #frequentSitesTable td {
    border: 1px solid #ddd;
  }

  #frequentSitesTable {
    border-collapse: collapse;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#frequentSitesTable').DataTable({
      "order": [] // Allows initial ordering by clicking columns
    });
  });

  // Today Visitors Chart
  const ctxToday = document.getElementById('todayVisitorsChart').getContext('2d');
  const todayVisitorsChart = new Chart(ctxToday, {
    type: 'line',
    data: {
      labels: ['03 November 2024', '04 November 2024', '05 November 2024', '06 November 2024', '07 November 2024', '08 November 2024'],
      datasets: [{
        label: 'Visitors',
        data: [5, 7, 9, 8, 15, 12],
        borderColor: '#007bff',
        fill: false,
      }]
    },
    options: {
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Date'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Visitors'
          },
          beginAtZero: true
        }
      }
    }
  });

  // Month Visitors Chart
  const ctxMonth = document.getElementById('monthVisitorsChart').getContext('2d');
  const monthVisitorsChart = new Chart(ctxMonth, {
    type: 'bar',
    data: {
      labels: ['December 2023', 'January 2024', 'February 2024', 'March 2024', 'April 2024', 'May 2024', 'June 2024', 'July 2024', 'August 2024', 'September 2024', 'October 2024', 'November 2024'],
      datasets: [{
        label: 'Visitors',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ,80, 93],
        backgroundColor: '#ffb400',
      }]
    },
    options: {
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Month'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Visitors'
          },
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/dashboard.blade.php ENDPATH**/ ?>