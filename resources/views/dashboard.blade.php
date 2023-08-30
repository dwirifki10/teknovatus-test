<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
        </div>
    </x-slot>


    <section class="section">
        @if (session("success"))
        <div class="alert alert-secondary" role="alert">
            <i class="bi bi-envelope-check-fill"></i>&nbsp;
            {{ session("success") }} &nbsp;<a href="#" class="alert-link">riyan.setiawan@teknovatus.com</a>. Silahkan check email kembali
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cloud Capacity Teknovatus</h4>
                <a href="{{ route("download") }}" class="btn btn-primary float-end">Download Data Excel &nbsp;<i class="bi bi-cloud-download-fill"></i></a>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </section>

<script>

const ctx = document.getElementById('myChart');
let dataFromPHP = {!! json_encode($capacity) !!};
console.log(dataFromPHP); // only displayed in development process

let dataCPU = [];
let dataMEM = [];
let dataLabels = [];
dataFromPHP.forEach((e) => {
    dataCPU.push(e.total_cpu);
});
dataFromPHP.forEach((e) => {
    dataMEM.push(e.total_mem);
});
dataFromPHP.forEach((e) => {
    dataLabels.push(e.cluster_name);
});

new Chart(ctx, {
    type: 'bar',
    data: {
    labels: dataLabels,
        datasets: [
            {
                label: 'CPU',
                data: dataCPU,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'MEM',
                data: dataMEM,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
    scales: {
        y: {
        beginAtZero: true
        }
    }
    }
});
</script>
</x-app-layout>
