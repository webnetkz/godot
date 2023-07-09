extends CharacterBody2D

var speed = 7
var transfromSpeed = 2
var gravity = 0.3

func _physics_process(delta):
	var direction = Vector2()
	if Input.is_action_pressed("Move"):
		direction.y -= speed
	if Input.is_action_pressed("MoveLeft"):
		direction.x -= transfromSpeed
	if Input.is_action_pressed("MoveRight"):
		direction.x += transfromSpeed
	

	direction.y += gravity
	direction = direction.normalized()

	velocity = direction
	move_and_collide(velocity)
