@extends('front.layouts.app')

@section('title', 'L\'Expérience VinSmoke - Restaurant Gastronomique Lomé')
@section('description', 'Découvrez l\'histoire de VinSmoke, notre philosophie culinaire, notre équipe de chefs passionnés et notre engagement pour l\'excellence.')

@section('content')

<!-- About Hero -->
<section class="about-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="hero-title mb-4">L'Art de la Table</h1>
                <p class="hero-subtitle">Une histoire de passion, de tradition et d'innovation</p>
                <div class="hero-stats mt-5">
                    <div class="row">
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">10+</div>
                                <div class="stat-label">Ans d'expérience</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Plats signature</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">200+</div>
                                <div class="stat-label">Vins sélectionnés</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Notre restaurant" class="img-fluid rounded-3 shadow-lg">
                    <div class="floating-badge">
                        <i class="fas fa-award"></i>
                        <span>Excellence 2024</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Notre histoire" class="img-fluid rounded-3">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-label text-gold">Notre Histoire</span>
                <h2 class="section-title text-start mb-4">Une Passion Héritée</h2>
                <p class="lead text-dark mb-4">
                    Fondé en 2010, VinSmoke incarne l'excellence culinaire au cœur de Lomé.
                    Notre restaurant est le fruit de trois générations de passionnés de gastronomie.
                </p>
                <p class="text-muted mb-4">
                    De nos grands-parents qui cultivaient les meilleurs produits locaux à nos chefs
                    formés dans les plus grandes écoles culinaires, chaque plat raconte une histoire.
                </p>
                <div class="signature">
                    <img src="/images/signature.png" alt="Signature" class="signature-img">
                    <div class="signature-info">
                        <strong>Jean-Luc Martin</strong>
                        <span>Fondateur & Chef Exécutif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Notre Philosophie</span>
            <h2 class="section-title">L'Excellence dans chaque détail</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="philosophy-card text-center">
                    <div class="philosophy-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Produits Locaux</h4>
                    <p class="text-muted">
                        Nous travaillons avec des producteurs locaux pour des ingrédients frais
                        et de saison, soutenant ainsi l'économie régionale.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="philosophy-card text-center">
                    <div class="philosophy-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h4>Fait Maison</h4>
                    <p class="text-muted">
                        Toutes nos préparations sont réalisées sur place par nos chefs,
                        des sauces aux desserts, garantissant authenticité et qualité.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="philosophy-card text-center">
                    <div class="philosophy-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h4>Développement Durable</h4>
                    <p class="text-muted">
                        Engagés dans une démarche éco-responsable, nous réduisons notre impact
                        environnemental et valorisons nos déchets.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Notre Équipe</span>
            <h2 class="section-title">Rencontrez nos Artisans</h2>
            <p class="section-subtitle">Des passionnés dévoués à votre expérience culinaire</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1583394293213-5e6f21753323?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Chef Jean-Luc" class="img-fluid">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Jean-Luc Martin</h5>
                        <span class="text-gold">Chef Exécutif</span>
                        <p class="text-muted small mt-2">
                            15 ans d'expérience dans les plus grandes maisons parisiennes
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1566554273541-37a9ca77b91f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Chef Sophie" class="img-fluid">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Sophie Dubois</h5>
                        <span class="text-gold">Sous-Chef Pâtissière</span>
                        <p class="text-muted small mt-2">
                            Spécialiste des desserts innovants et des pâtisseries françaises
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Sommelier Pierre" class="img-fluid">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Pierre Moreau</h5>
                        <span class="text-gold">Maître Sommelier</span>
                        <p class="text-muted small mt-2">
                            Expert en accords mets-vins avec plus de 200 références sélectionnées
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Manager Claire" class="img-fluid">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Claire Petit</h5>
                        <span class="text-gold">Directrice de Restaurant</span>
                        <p class="text-muted small mt-2">
                            Garante de votre expérience client et du service d'exception
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section-padding bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label text-gold">Nos Valeurs</span>
                <h2 class="section-title text-white text-start mb-4">Plus qu'un restaurant, un art de vivre</h2>

                <div class="values-list">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="value-content">
                            <h5>Excellence</h5>
                            <p class="text-light opacity-75 mb-0">
                                Nous visons la perfection dans chaque détail, de la sélection des produits au service.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="value-content">
                            <h5>Passion</h5>
                            <p class="text-light opacity-75 mb-0">
                                Notre amour pour la gastronomie se ressent dans chaque création de nos chefs.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="value-content">
                            <h5>Partage</h5>
                            <p class="text-light opacity-75 mb-0">
                                Nous croyons que les meilleurs moments se vivent autour d'une table.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="values-image">
                    <img src="https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Nos valeurs" class="img-fluid rounded-3">
                    <div class="experience-badge">
                        <div class="badge-content">
                            <span class="number">10</span>
                            <span class="text">Ans d'excellence</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-gold">
    <div class="container text-center">
        <h2 class="text-dark mb-3">Prêt à vivre l'expérience VinSmoke ?</h2>
        <p class="text-dark mb-4 opacity-75">
            Réservez votre table et laissez-nous vous faire découvrir l'art de la gastronomie
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('reservation.create') }}" class="btn btn-dark btn-lg">
                <i class="fas fa-calendar-check me-2"></i>Réserver une Table
            </a>
            <a href="{{ route('menu') }}" class="btn btn-outline-dark btn-lg">
                <i class="fas fa-utensils me-2"></i>Découvrir la Carte
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.about-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.hero-stats {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding-top: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--accent-gold);
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    opacity: 0.8;
    margin-top: 0.5rem;
}

.hero-image {
    position: relative;
}

.floating-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background: var(--accent-gold);
    color: var(--primary-dark);
    padding: 1rem;
    border-radius: var(--border-radius);
    font-weight: 600;
    box-shadow: var(--shadow-medium);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.story-image {
    position: relative;
}

.signature {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--border-light);
}

.signature-img {
    height: 40px;
    opacity: 0.8;
}

.signature-info {
    display: flex;
    flex-direction: column;
}

.signature-info strong {
    color: var(--primary-dark);
}

.signature-info span {
    font-size: 0.9rem;
    color: var(--text-gray);
}

.philosophy-card {
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
    height: 100%;
}

.philosophy-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.philosophy-icon {
    width: 80px;
    height: 80px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary-dark);
    font-size: 2rem;
}

.team-card {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
}

.team-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.team-image {
    position: relative;
    overflow: hidden;
}

.team-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: var(--transition);
}

.team-card:hover .team-image img {
    transform: scale(1.1);
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(26, 26, 26, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-links a {
    width: 40px;
    height: 40px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    text-decoration: none;
    transition: var(--transition);
}

.social-links a:hover {
    transform: scale(1.1);
    background: var(--accent-gold-light);
}

.team-info {
    padding: 1.5rem;
}

.team-info h5 {
    margin-bottom: 0.5rem;
    color: var(--primary-dark);
}

.values-list {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.value-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
}

.value-icon {
    width: 60px;
    height: 60px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    font-size: 1.5rem;
    flex-shrink: 0;
}

.value-content h5 {
    color: white;
    margin-bottom: 0.5rem;
}

.values-image {
    position: relative;
}

.experience-badge {
    position: absolute;
    bottom: -20px;
    left: -20px;
    background: var(--accent-gold);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-medium);
}

.badge-content {
    text-align: center;
    color: var(--primary-dark);
}

.badge-content .number {
    display: block;
    font-size: 2rem;
    font-weight: 900;
    line-height: 1;
}

.badge-content .text {
    font-size: 0.9rem;
    font-weight: 600;
}
</style>
@endpush
