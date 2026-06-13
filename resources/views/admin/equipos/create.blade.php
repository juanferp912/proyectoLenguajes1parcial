@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white fw-bold">➕ Registrar Selección del Mundial</div>
            <div class="card-body p-4">

                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Selecciona el País</label>
                        <select name="preset_team" class="form-select" required>
                            <option value="" disabled selected>Selecciona un país...</option>
                            
                            @if(!in_array('Alemania', $paisesRegistrados)) <option value="Alemania|de">Alemania</option> @endif
                            @if(!in_array('Arabia Saudí', $paisesRegistrados)) <option value="Arabia Saudí|sa">Arabia Saudí</option> @endif
                            @if(!in_array('Argelia', $paisesRegistrados)) <option value="Argelia|dz">Argelia</option> @endif
                            @if(!in_array('Argentina', $paisesRegistrados)) <option value="Argentina|ar">Argentina</option> @endif
                            @if(!in_array('Australia', $paisesRegistrados)) <option value="Australia|au">Australia</option> @endif
                            @if(!in_array('Austria', $paisesRegistrados)) <option value="Austria|at">Austria</option> @endif
                            @if(!in_array('Bélgica', $paisesRegistrados)) <option value="Bélgica|be">Bélgica</option> @endif
                            @if(!in_array('Bosnia y Herzegovina', $paisesRegistrados)) <option value="Bosnia y Herzegovina|ba">Bosnia y Herzegovina</option> @endif
                            @if(!in_array('Brasil', $paisesRegistrados)) <option value="Brasil|br">Brasil</option> @endif
                            @if(!in_array('Cabo Verde', $paisesRegistrados)) <option value="Cabo Verde|cv">Cabo Verde</option> @endif
                            @if(!in_array('Canadá', $paisesRegistrados)) <option value="Canadá|ca">Canadá</option> @endif
                            @if(!in_array('Catar', $paisesRegistrados)) <option value="Catar|qa">Catar</option> @endif
                            @if(!in_array('Chequia', $paisesRegistrados)) <option value="Chequia|cz">Chequia</option> @endif
                            @if(!in_array('Colombia', $paisesRegistrados)) <option value="Colombia|co">Colombia</option> @endif
                            @if(!in_array('Corea del Sur', $paisesRegistrados)) <option value="Corea del Sur|kr">Corea del Sur</option> @endif
                            @if(!in_array('Costa de Marfil', $paisesRegistrados)) <option value="Costa de Marfil|ci">Costa de Marfil</option> @endif
                            @if(!in_array('Croacia', $paisesRegistrados)) <option value="Croacia|hr">Croacia</option> @endif
                            @if(!in_array('Curazao', $paisesRegistrados)) <option value="Curazao|cw">Curazao</option> @endif
                            @if(!in_array('Ecuador', $paisesRegistrados)) <option value="Ecuador|ec">Ecuador</option> @endif
                            @if(!in_array('Egipto', $paisesRegistrados)) <option value="Egipto|eg">Egipto</option> @endif
                            @if(!in_array('Escocia', $paisesRegistrados)) <option value="Escocia|gb-sct">Escocia</option> @endif
                            @if(!in_array('España', $paisesRegistrados)) <option value="España|es">España</option> @endif
                            @if(!in_array('Estados Unidos', $paisesRegistrados)) <option value="Estados Unidos|us">Estados Unidos</option> @endif
                            @if(!in_array('Francia', $paisesRegistrados)) <option value="Francia|fr">Francia</option> @endif
                            @if(!in_array('Ghana', $paisesRegistrados)) <option value="Ghana|gh">Ghana</option> @endif
                            @if(!in_array('Haití', $paisesRegistrados)) <option value="Haití|ht">Haití</option> @endif
                            @if(!in_array('Inglaterra', $paisesRegistrados)) <option value="Inglaterra|gb-eng">Inglaterra</option> @endif
                            @if(!in_array('Irak', $paisesRegistrados)) <option value="Irak|iq">Irak</option> @endif
                            @if(!in_array('Irán', $paisesRegistrados)) <option value="Irán|ir">Irán</option> @endif
                            @if(!in_array('Japón', $paisesRegistrados)) <option value="Japón|jp">Japón</option> @endif
                            @if(!in_array('Jordania', $paisesRegistrados)) <option value="Jordania|jo">Jordania</option> @endif
                            @if(!in_array('Marruecos', $paisesRegistrados)) <option value="Marruecos|ma">Marruecos</option> @endif
                            @if(!in_array('México', $paisesRegistrados)) <option value="México|mx">México</option> @endif
                            @if(!in_array('Noruega', $paisesRegistrados)) <option value="Noruega|no">Noruega</option> @endif
                            @if(!in_array('Nueva Zelanda', $paisesRegistrados)) <option value="Nueva Zelanda|nz">Nueva Zelanda</option> @endif
                            @if(!in_array('Países Bajos', $paisesRegistrados)) <option value="Países Bajos|nl">Países Bajos</option> @endif
                            @if(!in_array('Panamá', $paisesRegistrados)) <option value="Panamá|pa">Panamá</option> @endif
                            @if(!in_array('Paraguay', $paisesRegistrados)) <option value="Paraguay|py">Paraguay</option> @endif
                            @if(!in_array('Portugal', $paisesRegistrados)) <option value="Portugal|pt">Portugal</option> @endif
                            @if(!in_array('República Democrática del Congo', $paisesRegistrados)) <option value="República Democrática del Congo|cd">República Democrática del Congo</option> @endif
                            @if(!in_array('Senegal', $paisesRegistrados)) <option value="Senegal|sn">Senegal</option> @endif
                            @if(!in_array('Sudáfrica', $paisesRegistrados)) <option value="Sudáfrica|za">Sudáfrica</option> @endif
                            @if(!in_array('Suecia', $paisesRegistrados)) <option value="Suecia|se">Suecia</option> @endif
                            @if(!in_array('Suiza', $paisesRegistrados)) <option value="Suiza|ch">Suiza</option> @endif
                            @if(!in_array('Túnez', $paisesRegistrados)) <option value="Túnez|tn">Túnez</option> @endif
                            @if(!in_array('Türkiye', $paisesRegistrados)) <option value="Türkiye|tr">Türkiye</option> @endif
                            @if(!in_array('Uruguay', $paisesRegistrados)) <option value="Uruguay|uy">Uruguay</option> @endif
                            @if(!in_array('Uzbekistán', $paisesRegistrados)) <option value="Uzbekistán|uz">Uzbekistán</option> @endif

                        </select>
                        @error('preset_team') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Asignar Grupo</label>
                        <select name="grupo" class="form-select" required>
                            <option value="" disabled selected>Selecciona el grupo...</option>
                            @foreach(range('A', 'L') as $letra)
                                @if(!in_array($letra, $gruposCompletos))
                                    <option value="{{ $letra }}">Grupo {{ $letra }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('grupo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('equipos.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">🚀 Guardar Selección</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection