document.addEventListener('DOMContentLoaded', function () {
    const colors = ['red', 'green', 'blue', 'yellow', 'purple'];
    const shapes = ['square', 'circle'];
    let startTime, endTime;

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function createShape() {
      const shapeType = shapes[getRandomInt(0, shapes.length - 1)];
      const color = colors[getRandomInt(0, colors.length - 1)];
      const size = getRandomInt(50, 200);
      
      const shape = document.createElement('div');
      shape.classList.add('shape', shapeType);
      shape.style.width = `${size}px`;
      shape.style.height = `${size}px`;
      shape.style.background = color;
      shape.style.top = `${getRandomInt(0, window.innerHeight - size)}px`;
      shape.style.left = `${getRandomInt(0, window.innerWidth - size)}px`;

      shape.addEventListener('click', handleShapeClick);

      document.body.appendChild(shape);

      startTime = Date.now();
    }

    function handleShapeClick() {
      endTime = Date.now();
      const reactionTime = (endTime - startTime) / 1000;
      alert(`Tu tiempo de reacción es: ${reactionTime} segundos`);
      removeShapes();
      setTimeout(createShape, getRandomInt(1000, 3000));
    }

    function removeShapes() {
      const shapes = document.querySelectorAll('.shape');
      shapes.forEach(shape => shape.remove());
    }

    createShape();
  });