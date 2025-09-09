<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Kreiranje narudžbine</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { display: flex; }
        .products {
            width: 70%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            background: #f9f9f9;
        }
        .cart {
            width: 30%;
            border: 1px solid #ccc;
            margin-left: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #f1f1f1;
        }
        .cart h3 { margin-bottom: 10px; }
        .cart ul { list-style: none; padding: 0; }
        .cart li { display: flex; justify-content: space-between; margin-bottom: 5px; }
        .buttons { margin-top: 15px; display: flex; justify-content: space-between; }
        .btn { padding: 8px 15px; border: none; border-radius: 6px; cursor: pointer; }
        .btn-add { background: #4CAF50; color: white; }
        .btn-cancel { background: #e74c3c; color: white; }
        .btn-create { background: #3498db; color: white; }
        .search-box { margin-bottom: 20px; }
        .search-box input[type="text"] { padding: 6px; width: 200px; }
        .search-box button { padding: 6px 12px; }
    </style>
</head>
<body>
    <h2>Kreiranje narudžbine</h2>

    
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search">
        <button onclick="searchProducts()">Pretraži</button>
    </div>

    <div class="container">
       
        <div class="products" id="productsList">
            @foreach ($proizvods as $proizvod)
                <div class="product" data-name="{{ strtolower($proizvod->naziv) }}">
                    <div class="image">
                        <img src="{{ asset('images/' . $proizvod->slika) }}" 
                            alt="{{ $proizvod->naziv }}" 
                            style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                    </div>
                    <p>{{ $proizvod->naziv }}</p>
                    <p>{{ $proizvod->cena }} RSD</p>
                    <button class="btn btn-add" onclick="addToCart('{{ $proizvod->naziv }}', {{ $proizvod->cena }})">Add</button>
                </div>
            @endforeach
        </div>

        
        <div class="cart">
            <h3>Stavke narudžbine</h3>
            <ul id="cartItems"></ul>
            <div class="buttons">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#placanjeModal">
                    Kreiraj
                </button>
                <button class="btn btn-cancel" onclick="clearCart()">Otkaži</button>
            </div>
            <p><strong>Cena:</strong> <span id="totalPrice">0</span> din</p>
        </div>
        
        <div class="modal fade" id="placanjeModal" tabindex="-1" aria-labelledby="placanjeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="placanjeModalLabel">Izaberite način plaćanja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
            </div>
            
            <div class="modal-body text-center">
                <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="nacinPlacanja" id="kes" value="kes" autocomplete="off">
                <label class="btn btn-outline-primary" for="kes">Keš</label>

                <input type="radio" class="btn-check" name="nacinPlacanja" id="kartica" value="kartica" autocomplete="off">
                <label class="btn btn-outline-primary" for="kartica">Kartica</label>
                </div>
            </div>
            
            <div class="modal-footer">
                <form action="{{ route('narudzbinas.store') }}" method="POST" id="naplataForm">
                    @csrf
                    <input type="hidden" name="nacin_placanja" id="placanjeInput">
                    <input type="hidden" name="stavke" id="cartItemsInput">   
                    <input type="hidden" name="ukupna_cena" id="totalPriceInput"> 
                    <button type="submit" class="btn btn-success" id="naplatiBtn" disabled>Naplati</button>
                </form>
            </div>
            
            </div>
        </div>
        </div>
    </div>

    <script>
        let cart = [];
        let total = 0;

        function addToCart(name, price) {
            cart.push({ name, price });
            total += price;
            renderCart();
        }

        function renderCart() {
            const cartItems = document.getElementById('cartItems');
            cartItems.innerHTML = '';
            cart.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `<span>${item.name}</span><span>${item.price}</span>`;
                cartItems.appendChild(li);
            });
            document.getElementById('totalPrice').innerText = total;
        }

        function clearCart() {
            cart = [];
            total = 0;
            renderCart();
        }

        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const products = document.querySelectorAll('.product');
            products.forEach(p => {
                const name = p.getAttribute('data-name');
                p.style.display = name.includes(query) ? 'block' : 'none';
            });
        }
        document.getElementById("naplataForm").addEventListener("submit", function() {
            cartItemsInput.value = JSON.stringify(cart);
            document.getElementById("totalPriceInput").value = total;
        });
        document.addEventListener("DOMContentLoaded", function() {
            const radioButtons = document.querySelectorAll("input[name='nacinPlacanja']");
            const naplatiBtn = document.getElementById("naplatiBtn");
            const placanjeInput = document.getElementById("placanjeInput");
            const cartItemsInput = document.getElementById("cartItemsInput");

            radioButtons.forEach(radio => {
                radio.addEventListener("change", function() {
                    naplatiBtn.disabled = false;
                    placanjeInput.value = this.value;
                });
            });

          
            document.getElementById("naplataForm").addEventListener("submit", function() {
                cartItemsInput.value = JSON.stringify(cart);
            });
        });
            
    </script>
</body>
</html>
