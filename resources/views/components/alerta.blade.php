<!-- Caixa de avido -->
@props(['tipo' => 'info'])

<!-- o texto entre as etiquetas chega no $slot -->
 <div {{ $attributes->merge(['class' => 'alerta alerta-' . $tipo]) }} role="status">
    {{ $slot }}
 </div>