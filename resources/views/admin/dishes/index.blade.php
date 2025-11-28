@extends('admin.layouts.app')

@section('title', 'Gestion des Plats')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Gestion des Plats</h1>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nouveau Plat
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Disponible</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dishes as $dish)
                        <tr>
                            <td>
                                @if($dish->image)
                                    <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}"
                                         class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-utensils text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->category->name }}</td>
                            <td>{{ $dish->formatted_price }}</td>
                            <td>
                                <span class="badge bg-{{ $dish->is_available ? 'success' : 'danger' }}">
                                    {{ $dish->is_available ? 'Oui' : 'Non' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $dish->is_featured ? 'warning' : 'secondary' }}">
                                    {{ $dish->is_featured ? 'Oui' : 'Non' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plat ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucun plat trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
