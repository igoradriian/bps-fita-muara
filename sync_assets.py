from pathlib import Path
import shutil
root = Path(__file__).resolve().parent
source = root / 'resources' / 'js'
dest = root / 'public' / 'assets' / 'js'
for file in source.rglob('*.js'):
    target = dest / file.relative_to(source)
    target.parent.mkdir(parents=True, exist_ok=True)
    shutil.copy2(file, target)
    print('Synced:', target.relative_to(root))
