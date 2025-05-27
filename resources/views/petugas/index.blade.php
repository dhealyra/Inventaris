@extends('layouts.app')

@section('page-title', 'Petugas')

@section('content')     
<div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="card lg:col-span-5 col-span-1"> <!-- supaya cardnya lebar -->
        <div class="col-span-2">
			<div class="card h-full">
				<div class="card-body">
					<a href="{{ route('petugas.create') }}" 
						class="inline-block py-3 px-8 rounded-sm text-lg font-semibold border border-transparent bg-blue-600 text-white hover:bg-blue-700">
						<i class="ti ti-folder-plus"></i> Tambah Data
					</a>

					<div class="relative overflow-x-auto mt-6">
						<table class="text-left w-full whitespace-nowrap text-base text-gray-700"> <!-- font lebih besar -->
							<thead>
								<tr class="text-base bg-gray-100">
									<th scope="col" class="p-6 font-semibold">#</th> <!-- padding lebih besar -->
									<th scope="col" class="p-6 font-semibold">Profile</th>
									<th scope="col" class="p-6 font-semibold">Email</th>
									<th scope="col" class="p-6 font-semibold">Action</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($petugas as $user)
								<tr class="border-b border-gray-300">
									<td class="p-6 text-lg font-semibold">
										{{ $loop->iteration }}
									</td>
									<td class="p-6 text-lg">
										<div class="flex gap-8 items-center">
											<div class="h-16 w-16 inline-block"> <!-- gambar profil lebih besar -->
                                                <img src="../assets/images/profile/user-1.jpg" alt="Profile Picture" class="rounded-full w-full h-full object-cover">
                                            </div>
											<div class="flex flex-col gap-2 text-gray-700">
												<h3 class="font-bold text-xl">{{ $user->name }}</h3>
												<span class="font-normal text-lg">PETUGAS {{ strtoupper($user->status) }}</span>
											</div>
										</div>
									</td>
									<td class="p-6 text-lg font-medium">
										{{ $user->email }}
									</td>
									<td class="p-6 flex items-center gap-4">
										<a href="{{ route('petugas.edit', $user->id) }}" 
										 class="py-3 px-8 rounded-lg text-lg font-semibold border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300 text-center">
											Edit
										</a>

										<form action="{{ route('petugas.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
											@csrf
											@method('DELETE')
											<button type="submit" onclick="return confirm('Yakin ingin hapus user ini?')" 
												class="py-3 px-9 rounded-2xl text-lg font-semibold border border-red-600 text-red-600 hover:bg-red-600 hover:text-white hover:border-red-600 transition duration-300">
												Delete
											</button>
										</form>
									</td>

								</tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
