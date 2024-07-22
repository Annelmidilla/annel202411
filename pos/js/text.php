<div style="cursor:pointer;" class="col-md-2">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><br>T:'+this.talla+' '+this.colorNombre+' ['+stock+']</h6>
            <p class="card-text">S./'+venta+'</p><a href="#" onclick=agregar_producto('+this.codigo+')
                class="btn btn-success">+</a><button type="button" class="btn btn-info" data-bs-toggle="modal"
                data-bs-target="#StockModal" onclick="stockGeneral(' + this.codigo + ')"> <img src='+img_stock+'
                    width="20" height="20"> </button>
        </div>
    </div>
</div>
</div>