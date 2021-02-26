    const boxScale=.1;
    var positionsThree = [];
    var uvsThree = [];
    for (const vertex of verticesThree) {
      positionsThree.push(...vertex.pos);
      uvsThree.push(...vertex.uv);
    }
    const geometryThreeOutside = new THREE.BufferGeometry();
    const geometryThreeInside = new THREE.BufferGeometry();
    const positionNumComponents = 3;
    const uvNumComponents = 2;

    geometryThreeOutside.setAttribute(
      'position',
      new THREE.BufferAttribute(new Float32Array(positionsThree), positionNumComponents));
    geometryThreeOutside.computeVertexNormals();
    geometryThreeOutside.setAttribute(
      'uv',
      new THREE.BufferAttribute(new Float32Array(uvsThree), uvNumComponents));

    geometryThreeInside.setAttribute(
      'position',
      new THREE.BufferAttribute(new Float32Array(positionsThree), positionNumComponents));
    geometryThreeInside.computeVertexNormals();
    geometryThreeInside.setAttribute(
      'uv',
      new THREE.BufferAttribute(new Float32Array(uvsThree), uvNumComponents));

    boxThreeOutside = new THREE.Mesh(geometryThreeOutside, materialOutside);
    boxThreeOutside.scale.set(boxScale,boxScale,boxScale);
    // scene.add(boxThreeOutside);

    boxThreeInside = new THREE.Mesh(geometryThreeInside, materialInside);
    boxThreeInside.scale.set(boxScale,boxScale,boxScale);
    // scene.add(boxThreeInside);
