<div class="d-flex justify-content-center mb-3">
  <div class="text-center" style="min-width: 200px;">
    <label for="tot" class="form-label fw-semibold">Total do Pedido:</label>
    <input type="number" id="tot" class="form-control text-center" readonly>
  </div>
</div>

<!-- Valor Pago e Troco: lado a lado, centralizados -->
<div class="d-flex justify-content-center gap-4 flex-wrap">
  <div>
    <label for="pago" class="form-label fw-semibold">Valor Pago:</label>
    <input oninput="calcularTroco()" type="number" id="pago" min="0" class="form-control text-center">
  </div>

  <div>
    <label for="troco" class="form-label fw-semibold">Troco a Devolver:</label>
    <input type="number" id="troco" class="form-control text-center" readonly>
  </div>
</div>

<script>
    function calcularTroco(){
        const total = parseFloat(document.getElementById('tot').value) || 0;
        const pago = parseFloat(document.getElementById('pago').value) || 0;

        let troco = pago - total;
        troco = troco > 0 ? troco : 0;

        document.getElementById('troco').value = troco.toFixed(2);
    }
</script>