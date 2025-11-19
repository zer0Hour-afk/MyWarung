<nav>
    <div><strong>🛒 MyWarung-01</strong></div>
    <div class="menu">
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/kategori') }}">Kategori</a>
        <a href="{{ url('/satuan') }}">Satuan</a>
        <a href="{{ url('/barang') }}">Barang</a>
        <a href="{{ url('/pemasok') }}">Pemasok</a>
    </div>
</nav>
<style>
    nav {
        background-color: #f8f9fa;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .menu a {
        margin-left: 1.5rem;
        text-decoration: none;
        color: #333;
        font-weight: 500;
    }
    .menu a:hover {
        color: #007bff;
    }