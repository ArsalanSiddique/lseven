<div>

    <h3 class="text-center mt-4 mb-2 font-weight-bolder">Update Steps <i class="fa fa-plus pl-2" style="font-size:16px;cursor:pointer;" wire:click="addStep"></i> </h3>
    <hr>

    @foreach($counter as $step) 
    
    <div class="form-group" wire:key="{{ $loop->index }}">
        <label for="" class="font-weight-bold mr-3">Step {{ $loop->index+1 }}:</label>
        <div class="form-inline">

            <input type="text" name="stepsName[]" class="form-control" id="" style="width:90%;" placeholder="Add step" @if ( is_array($step) ) value="{{ $step['steps'] }}" @endif  >
            <input type="hidden" name="stepsId[]" @if ( is_array($step) ) value="{{ $step['id'] }}" @endif  >

            <div class="form-check mb-2 mr-sm-2">
                <h5 wire:click="removeStep({{ $loop->index }})"><i class="fa fa-times text-danger pl-3 mt-3" style="cursor: pointer;"></i></h5>
            </div>
        </div>
    </div>
    @endforeach
</div>