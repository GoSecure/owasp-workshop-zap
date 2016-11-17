import hashlib
from base64 import b64encode

def process(data):
    md = hashlib.md5()
    md.update(data)
    return b64encode(data+"-"+md.hexdigest())
