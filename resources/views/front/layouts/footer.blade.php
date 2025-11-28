<footer class="custom-footer bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-wine-glass-alt me-2"></i>VinSmoke
                </h5>
                <p class="text-light">Restaurant raffiné au cœur de Lomé, alliant cuisine d'exception et ambiance élégante.</p>
                <div class="social-links">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-tripadvisor"></i></a>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Horaires</h5>
                <ul class="list-unstyled">
                    <li>Lun - Ven: 11h30 - 22h00</li>
                    <li>Sam - Dim: 12h00 - 23h00</li>
                </ul>
                <a href="{{ route('reservation.create') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-calendar-check me-1"></i>Réserver une table
                </a>
            </div>

            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i>Rue des Restaurants, Lomé</li>
                    <li><i class="fas fa-phone me-2"></i>+228 XX XX XX XX</li>
                    <li><i class="fas fa-envelope me-2"></i>contact@vinsmoke.tg</li>
                </ul>
            </div>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">&copy; 2024 VinSmoke Restaurant. Tous droits réservés.</p>
        </div>
    </div>
</footer>
