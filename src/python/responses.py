from random import randint

def handle_response(message) -> str:
    p_message = message.lower()
    
    if p_message == 'hello':
        return 'Hey you !'
    
    elif p_message == 'roll':
        return str(randint(1, 6))
    
    elif p_message == '!help':
        return "This is a help message that you can modify."