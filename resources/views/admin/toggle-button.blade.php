<div class="m-2 toggle colour">
	<input wire:model="isActive" type="checkbox" name="toggle" id="{{ $field.$model->id }}"
		class="hidden toggle-checkbox">
	<label for="{{ $field.$model->id }}"
		class="block w-12 h-6 duration-150 ease-out rounded-full cursor-pointer transition-color toggle-label"></label>
</div>
