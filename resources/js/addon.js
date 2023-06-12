import FieldtypesProvider from './fieldtypes/provider'

Statamic.booting(() => {
  new FieldtypesProvider();
});
