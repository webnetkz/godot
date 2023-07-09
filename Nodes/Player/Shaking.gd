extends Camera2D

var shakeIntensity = 5
var shaking = false

func _physics_process(delta):
	if Input.is_action_pressed("Move"): 
		shaking = true
	else:
		shaking = false

	if shaking:
		offset = Vector2(
			randf_range(-shakeIntensity, shakeIntensity), 
			randf_range(-shakeIntensity, shakeIntensity)
		)
	else:
		offset = Vector2(0, 0)
