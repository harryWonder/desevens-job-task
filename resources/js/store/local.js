import Pouchdb from 'pouchdb';

export default {
  admin: () => {
    return new Pouchdb('admin', {
      auto_compaction: true,
      adapter: 'idb',
      revs_limit: 5000,
      deterministic_revs: true
    });
  },
  customer: () => {
    return new Pouchdb('customer', {
      auto_compaction: true,
      adapter: 'idb',
      revs_limit: 5000,
      deterministic_revs: true
    });
  },
  driver: () => {
    return new Pouchdb('driver', {
      auto_compaction: true,
      adapter: 'idb',
      revs_limit: 5000,
      deterministic_revs: true
    });
  },
  cart: () => {
    return new Pouchdb('cart', {
      auto_compaction: true,
      adapter: 'idb',
      revs_limit: 5000,
      deterministic_revs: true
    });
  }
}
