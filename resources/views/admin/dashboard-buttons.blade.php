@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-full overflow-y-auto">
        <div class="container grid px-6 mx-auto py-4 mb-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Buttons
            </h2>

            <!-- Button sizes -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Sizes
            </h4>
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <!-- Divs are used just to display the examples. Use only the button. -->
                <div>
                    <button id="downloadBackupButton"
                        class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Larger button
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        async function downloadBackup() {
            try {
                const response = await fetch('{{ route('backup.create') }}', {

                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/octet-stream'
                    }
                });
                console.log("res", response)

                if (!response.ok) { // Periksa jika respons TIDAK OK
                    throw new Error('Network response was not ok.');
                }

                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'backup.sql'; // Nama file yang diunduh
                document.body.appendChild(a);
                a.click();
                a.remove();
            } catch (error) {
                console.error('Error downloading the backup:', error);
            }
        }

        // Menjalankan fungsi downloadBackup saat tombol diklik
        document.getElementById('downloadBackupButton').addEventListener('click', downloadBackup);
    </script>
@endsection
