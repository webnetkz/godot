extends CPUParticles2D

var isEmitting: bool = false

func _ready():
	emitting = isEmitting

func _physics_process(delta):
	if Input.is_action_pressed("Move"): 
		emitting = true
	else:
		emitting = false
