<h1 style="text-align:center; margin-bottom:20px;">Proizvodi</h1>

<div class="container">
    <div class="products" id="productsList" style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
    ">
        @if($proizvodi->isEmpty())
            <p style="grid-column:1/-1; text-align:center;">Nema proizvoda u ovoj grupi.</p>
        @else
            @foreach ($proizvodi as $proizvod)
                <div class="product" style="
                    background:#f9f9f9;
                    border-radius:10px;
                    padding:15px;
                    text-align:center;
                    box-shadow:0 4px 6px rgba(0,0,0,0.1);
                    transition: transform 0.2s, box-shadow 0.2s;
                ">
                    <div class="image" style="margin-bottom:10px;">
                        <img src="{{ asset('images/' . $proizvod->slika) }}" 
                             alt="{{ $proizvod->naziv }}" 
                             style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                    </div>
                    <p style="font-weight:bold; margin:5px 0;">{{ $proizvod->naziv }}</p>
                    <p style="color:#555; margin:0;">{{ $proizvod->cena }} RSD</p>
                </div>
            @endforeach
        @endif
    </div>
</div>


<div style="text-align:center; margin-top:30px;">
    <button onclick="history.back()" style="
        padding: 10px 25px;
        background:#4a90e2;
        color:white;
        border:none;
        border-radius:6px;
        font-size:16px;
        cursor:pointer;
        transition: background 0.3s;
    " onmouseover="this.style.background='#357ab8'" onmouseout="this.style.background='#4a90e2'">
        Nazad
    </button>
</div>

<style>
    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0,0,0,0.15);
    }
</style>
